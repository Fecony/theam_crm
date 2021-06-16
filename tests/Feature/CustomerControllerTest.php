<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Photo;
use App\Models\User;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    public function testListReturnsUnauthorized(): void
    {
        $this->json('GET', 'api/v1/customers')
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testListReturnsValidResponse(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->seed([
            UserSeeder::class,
            CustomerSeeder::class
        ]);

        $this->json('GET', 'api/v1/customers')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(15, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        "id",
                        "name",
                        "surname",
                        "photoUrl",
                        "created_by" => [
                            "id",
                            "email",
                            "username",
                            "is_admin",
                        ],
                        "updated_by" => [
                            "id",
                            "email",
                            "username",
                            "is_admin",
                        ],
                        "created_at",
                        "updated_at",
                    ]
                ]
            ]);
    }

    public function testViewReturnsValidResponse(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $customer = Customer::factory()->create([
            'name' => 'Test',
            'surname' => 'Customer'
        ]);

        $this->json('GET', "api/v1/customers/{$customer->id}")
            ->assertStatus(Response::HTTP_OK)
            ->assertExactJson([
                'data' => [
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'surname' => $customer->surname,
                    'photoUrl' => null,
                    'created_by' => [
                        'id' => auth()->id(),
                        'email' => auth()->user()->email,
                        'username' => auth()->user()->username,
                        'is_admin' => auth()->user()->isAdmin()
                    ],
                    'updated_by' => [
                        'id' => auth()->id(),
                        'email' => auth()->user()->email,
                        'username' => auth()->user()->username,
                        'is_admin' => auth()->user()->isAdmin()
                    ],
                    'created_at' => (string) $customer->created_at,
                    'updated_at' => (string) $customer->updated_at,
                ]
            ]);
    }

    public function testViewReturnsErrorWhenCustomerIsMissing(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->json('GET', "api/v1/customers/15")
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertExactJson([
                "error" => "Resource not found"
            ]);
    }

    public function testCustomerIsCreatedSuccessfully(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $customerData = [
            'name' => 'Test',
            'surname' => 'Customer'
        ];

        $this->json('POST', 'api/v1/customers', $customerData)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'surname',
                    'photoUrl',
                    'created_by' => [
                        'id',
                        'email',
                        'username',
                        'is_admin'
                    ],
                    'updated_by' => [
                        'id',
                        'email',
                        'username',
                        'is_admin'
                    ],
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('customers', $customerData);
    }

    public function testReturnsListOfErrorsIfValidationDidNotPass(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $customerData = [
            'name' => 'Test',
        ];

        $this->json('POST', 'api/v1/customers', $customerData)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'surname' => [
                        'The surname field is required.'
                    ]
                ]
            ]);
    }

    public function testCustomerIsUpdatedSuccessfully(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $photo = Photo::factory()->create();

        $customer = Customer::create([
            'name' => 'Test',
            'surname' => 'Customer',
        ]);

        $updateData = [
            'name' => 'Blossom',
            'photo_id' => $photo->id,
        ];

        $this->json('PUT', "api/v1/customers/{$customer->id}", $updateData)
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => [
                    'id' => $customer->id,
                    'name' => $updateData['name'],
                    'surname' => $customer->surname,
                    'photoUrl' => Storage::url($photo->path),
                    'created_by' => [
                        'id' => auth()->id(),
                        'email' => auth()->user()->email,
                        'username' => auth()->user()->username,
                        'is_admin' => auth()->user()->isAdmin()
                    ],
                    'updated_by' => [
                        'id' => auth()->id(),
                        'email' => auth()->user()->email,
                        'username' => auth()->user()->username,
                        'is_admin' => auth()->user()->isAdmin()
                    ],
                ]
            ]);
    }

    public function testCustomerIsDeletedSuccessfully(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $customerData = [
            'name' => 'Test',
            'surname' => 'Customer'
        ];

        $customer = Customer::create($customerData);

        $this->json('DELETE', "api/v1/customers/$customer->id")
            ->assertNoContent();

        $this->assertDatabaseMissing('customers', $customerData);
    }
}
