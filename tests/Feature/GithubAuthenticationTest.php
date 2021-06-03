<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GithubAuthenticationTest extends TestCase
{
    public function testReturnsRedirectUrl(): void
    {
        $url = 'https://github.com/login/oauth/authorize?' . http_build_query([
                'client_id' => env('GITHUB_CLIENT_ID'),
                'redirect_uri' => URL::to('/api/v1/auth/github/callback'),
                'scope' => 'user:email',
                'response_type' => 'code'
            ]);

        $this->json('GET', 'api/v1/auth/github')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['url'])
            ->assertJson([
                'url' => $url,
            ]);
    }
}
