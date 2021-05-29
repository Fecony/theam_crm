<?php

namespace App\Services;

use App\Models\SocialAccount;
use App\Models\User;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class SocialAccountService
{
    public function firstOrCreate(SocialiteUser $providerUser, string $provider): User
    {
        $socialAccount = SocialAccount::where('provider', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();

        if ($socialAccount) {
            return $socialAccount->user;
        }

        $user = User::firstOrCreate(
            ['email' => $providerUser->getEmail()],
            ['username' => $providerUser->getNickname()]
        );

        $user->socialAccounts()->create([
            'provider' => $provider,
            'provider_id' => $providerUser->getId(),
        ]);

        return $user;
    }
}
