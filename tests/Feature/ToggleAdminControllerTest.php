<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ToggleAdminControllerTest extends TestCase
{
    public function testItTogglesAdminState(): void
    {
        Sanctum::actingAs(User::factory(['is_admin' => true])->create());

        $adminUser = User::factory(['is_admin' => true])->create();

        $this->json('PATCH', "api/v1/users/{$adminUser->id}/toggle_admin")
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => [
                    'is_admin' => false
                ]
            ]);
    }
}
