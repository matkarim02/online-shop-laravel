<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController
{

    public function getSignUpForm()
    {
        return view('signUpForm');
    }
    public function signUp(SignUpRequest $request)
    {
        $data = $request->all();

        $user = User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->redirectTo('/login');

    }


    public function getLogin()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {

        $result = Auth::attempt([
            'email' => $request->get('username'),
            'password' => $request->get('password'),
        ]);


        if ($result) {
            return redirect('/catalog'); // например
        } else {
            return back()->withErrors([
                'username' => 'Неверный email или пароль',
            ])->withInput();
        }

    }

    public function logout(Request $request )
    {
        // Очищаем данные о пользователе в сессии.
        Auth::logout();

        // Делаем недействительной текущую сессию.
        $request->session()->invalidate();

        // Пересоздаём CSRF-токен.
        $request->session()->regenerateToken();

        // Перенаправляем пользователя на главную страницу или страницу входа.
        return redirect('/login');
    }


}
