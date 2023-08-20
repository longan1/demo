<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private TokenRepository $tokenRepository
    ) {
    }

    public function create(array $input) : User {
        unset($input['c_password']);
        $user = $this->userRepository->create($input);
        $user->createToken(config("app.name"))->accessToken;
        return $user;
    }

    public function isVaildAuthentication($email, $password) : bool
    {
        return Auth::attempt(['email' => $email, 'password' => $password]);
    }

    public function getTokenUser() : string{
        $user =  Auth::user();
        return $user->createToken(config("app.name"))->accessToken;
    }

    public function revokeToken() : bool{
        $user =  Auth::user();
        if($user)
        {
            $tokenId = $user->token()->id;
            $this->tokenRepository->revokeAccessToken($tokenId);
            return true;
        }
        return false;
    }
}
