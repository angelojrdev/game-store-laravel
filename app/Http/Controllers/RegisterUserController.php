<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(RegisterUserRequest $request)
    {
        $user = $this->userService->register($request->validated());

        Auth::login($user);

        return redirect()->intended();
    }
}
