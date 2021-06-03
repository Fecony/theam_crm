<?php

namespace Tests\Feature;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PhotoControllerTest extends TestCase
{
    public function testPhotoIsUploadedSuccessfully(): void
    {
        Sanctum::actingAs(User::factory()->create());

        Storage::fake('photos/testing');

        $response = $this->json('POST', 'api/v1/photos', [
            'photo' => UploadedFile::fake()->image('avatar.jpg')
        ])->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'photo' => [
                    'id',
                    'name',
                    'path',
                    'created_at',
                    'updated_at'
                ]
            ])->getContent();

        $photo = json_decode($response, true)['photo'];

        Storage::assertExists($photo['path']);

        $this->assertDatabaseHas('photos', [
            'name' => $photo['name'],
            'path' => $photo['path']
        ]);
    }

    public function testPhotoUploadFailsWithUnsupportedFileFormat(): void
    {
        Sanctum::actingAs(User::factory()->create());

        Storage::fake('photos/testing');

        $this->json('POST', 'api/v1/photos', [
            'photo' => UploadedFile::fake()->create(
                'oh_no_what_is_this.pdf', 10
            )
        ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertExactJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "photo" => [
                        0 => "The photo must be a file of type: png, jpg, jpeg."
                    ]
                ]
            ]);
    }

    public function testPhotoUploadFailsWithExceedPhotoSize(): void
    {
        Sanctum::actingAs(User::factory()->create());

        Storage::fake('photos/testing');

        $this->json('POST', 'api/v1/photos', [
            'photo' => UploadedFile::fake()->create('avatar.jpg', 2049, 'image/jpeg')
        ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertExactJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "photo" => [
                        0 => "The photo must not be greater than 2048 kilobytes."
                    ]
                ]
            ]);
    }

    public function testPhotoUploadFailsWithMissingPhoto(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->json('POST', 'api/v1/photos')
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'photo' => [
                        'The photo field is required.'
                    ]
                ],
            ]);
    }

    public function testPhotoIsRemovedSuccessfully(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $photo = Photo::factory()->create();

        $this->json('DELETE', "api/v1/photos/{$photo->id}")->assertNoContent();

        $this->assertDeleted($photo);

        $this->assertDatabaseMissing('photos', [
            'name' => $photo->name,
            'path' => $photo->path
        ]);
    }

    public function testRemovesErrorIfTriedToRemovePhotoThatDoesNotExistInPath(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $photo = Photo::factory([
            'path' => 'I_Dont_exist/path/image.jpeg'
        ])->create();

        $this->json('DELETE', "api/v1/photos/{$photo->id}")
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertExactJson([
                "error" => "Photo does not exist."
            ]);
    }

    public function testReturnsErrorIfTriedToRemovePhotoThatDoesNotExistInDatabase(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->json('DELETE', 'api/v1/photos/231')
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertExactJson([
                "error" => "Resource not found"
            ]);
    }
}
