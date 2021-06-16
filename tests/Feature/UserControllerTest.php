<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testListReturnsUnauthorized(): void
    {
        $this->json('GET', 'api/v1/users')
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testReturnsErrorWhenNonAdminUserTriedToAccessEndpoint(): void
    {
        Sanctum::actingAs(User::factory([
            'is_admin' => false
        ])->create());

        $this->json('GET', 'api/v1/users')
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertExactJson([
                'message' => 'User is not authorized to perform this action.'
            ]);
    }

    public function testListReturnsValidResponse(): void
    {
        Sanctum::actingAs(User::factory(['is_admin' => true])->create());

        $this->seed([
            UserSeeder::class,
        ]);

        $this->json('GET', 'api/v1/users')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(12, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'email',
                        'username',
                        'is_admin',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }

    public function testViewReturnsValidResponse(): void
    {
        Sanctum::actingAs(User::factory(['is_admin' => true])->create());

        $user = User::factory()->create();

        $this->json('GET', "api/v1/users/{$user->id}")
            ->assertStatus(Response::HTTP_OK)
            ->assertExactJson([
                'data' => [
                    'id' => $user->id,
                    'email' => $user->email,
                    'username' => $user->username,
                    'is_admin' => $user->is_admin,
                    'created_at' => (string) $user->created_at,
                    'updated_at' => (string) $user->updated_at,
                ]
            ]);
    }

    public function testViewReturnsErrorWhenUserIsMissing(): void
    {
        Sanctum::actingAs(User::factory(['is_admin' => true])->create());

        $this->json('GET', "api/v1/users/999")
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertExactJson([
                "error" => "Resource not found"
            ]);
    }

    public function testUserIsCreatedSuccessfully(): void
    {
        Sanctum::actingAs(User::factory(['is_admin' => true])->create());

        $userData = [
            'username' => 'GithubOctopus',
            'email' => 'octopy@github.com'
        ];

        $this->json('POST', 'api/v1/users', $userData)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'email',
                    'username',
                    'is_admin',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('users', $userData);
    }

    public function testReturnsListOfErrorsIfValidationDidNotPass(): void
    {
        Sanctum::actingAs(User::factory(['is_admin' => true])->create());

        $userData = [
            'email' => 'GitHubUser',
        ];

        $this->json('POST', 'api/v1/users', $userData)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => [
                        'The email must be a valid email address.'
                    ],
                    'username' => [
                        'The username field is required.'
                    ]
                ]
            ]);
    }

    public function testUserIsUpdatedSuccessfully(): void
    {
        Sanctum::actingAs(User::factory(['is_admin' => true])->create());

        $user = User::create([
            'username' => 'GithubOctopus',
            'email' => 'octopy@github.com'
        ]);

        $updateData = [
            'username' => 'CuteGithubOctopus',
        ];

        $this->json('PUT', "api/v1/users/{$user->id}", $updateData)
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => [
                    'id' => $user->id,
                    'email' => $user->email,
                    'username' => $updateData['username'],
                    'is_admin' => $user->isAdmin(),
                ]
            ]);
    }

    public function testUserIsDeletedSuccessfully(): void
    {
        Sanctum::actingAs(User::factory(['is_admin' => true])->create());

        $userData = [
            'username' => 'GithubOctopus',
            'email' => 'octopy@github.com'
        ];

        $user = User::create($userData);

        $this->json('DELETE', "api/v1/users/$user->id")
            ->assertNoContent();

        $this->assertDatabaseMissing('users', $userData);
    }
}
