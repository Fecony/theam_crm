<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class LogoutControllerTest extends TestCase
{
    public function testItRemovesCurrentUserToken(): void
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $this->json('DELETE', 'api/v1/logout')->assertNoContent();
    }
}
