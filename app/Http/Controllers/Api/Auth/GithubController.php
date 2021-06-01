<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;

/**
 * @group Github Authentication
 *
 * @unauthenticated
 *
 * API for OAuth Authentication.
 */
class GithubController extends Controller implements SocialAccount
{
    /**
     * @response 200 {
     *  "url": "https://github.com/login/oauth/authorize?client_id=9e62a6dce2a56a57c82a&redirect_uri=http%3A%2F%2Ftheam_crm.test%2Fapi%2Fv1%2Fauth%2Fgithub%2Fcallback&scope=user%3Aemail&response_type=code"
     * }
     *
     * @return JsonResponse
     */
    public function redirect(): JsonResponse
    {
        return response()->json([
            'url' => Socialite::driver('github')->stateless()->redirect()->getTargetUrl()
        ]);
    }

    /**
     * @response {
     *  "user": {
     *      "id": 1,
     *      "email": "example@example.com",
     *      "username": "Github username",
     *      "is_admin": false
     *  },
     *  "token": "BEARER TOKEN"
     * }
     *
     * @param  SocialAccountService  $socialAccountService
     * @return JsonResponse
     */
    public function callback(SocialAccountService $socialAccountService): JsonResponse
    {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = $socialAccountService->firstOrCreate($githubUser, 'github');
        $token = $user->createToken('Personal Access Token');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ]);
    }
}
