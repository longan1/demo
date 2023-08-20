<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use App\Trait\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Request;
class AuthController extends Controller
{
    use ApiResponseTrait;
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function register(RegisterRequest $request): JsonResponse
    {
        $input = $request->all();
        $user = $this->userService->create($input);
        return $this->successResponse($user, 'User register successfully.');      
    }
     
    public function login(LoginRequest $request): JsonResponse
    {
       $email = $request->email;
       $password = $request->password;
        if($this->userService->isVaildAuthentication($email, $password)){ 
            $responeUser['token'] =  $this->userService->getTokenUser(); 
            return $this->successResponse($responeUser, 'User login successfully.');
        } 
        return $this->unauthorizedResponse();
    }

    public function logout(Request $request){
        $isLogout = $this->userService->revokeToken();
        if($isLogout)
        {
            return $this->successResponse([], 'User logout successfully.'); 
        }
        return $this->unauthorizedResponse();
    }

}
