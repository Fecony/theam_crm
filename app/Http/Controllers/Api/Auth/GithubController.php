<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller implements SocialAccountController
{
    public function redirect(): JsonResponse
    {
        return response()->json([
            'url' => Socialite::driver('github')->stateless()->redirect()->getTargetUrl()
        ]);
    }

    public function callback(SocialAccountService $socialAccountService): JsonResponse
    {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = $socialAccountService->firstOrCreate($githubUser, 'github');

        return response()->json([
            'user' => $user,
            'token' => ''
        ]);
    }
}
