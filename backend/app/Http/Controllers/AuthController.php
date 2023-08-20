<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Trait\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    use ApiResponseTrait;
    //
    public function register(RegisterRequest $request): JsonResponse
    {
     
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $newUser = User::create($input);
        $responeUser['token'] =  $newUser->createToken(config("app.name"))->accessToken;
        $responeUser['name'] =  $newUser->name;
   
        return $this->successResponse($responeUser, 'User register successfully.');
    }
     
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $responeUser['token'] =  $user->createToken(config("app.name"))->accessToken; 
            $responeUser['name'] =  $user->name;
   
            return $this->successResponse($responeUser, 'User login successfully.');
        } 
        else{ 
            return $this->unauthorizedResponse();
        } 
    }
}
