<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
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
        $data = $request->validated();

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
        $data = $request->validated();

        $result = Auth::attempt([
            'email' => $data['username'],
            'password' => $data['password'],
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

    public function getProfile()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }




    public function getEditProfile()
    {
        $user = Auth::user();

        return view('edit_profile', compact('user'));
    }




    public function editProfile(EditProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        $user->name = $data['name'];
        $user->email = $data['email'];
        if(!empty($data['password'])){
            $user->password = Hash::make($data['password']);
        }

        $user->save();

//        User::query()->where('id', $user->id)
//                    ->update([
//                        'name' => $data['name'],
//                        'email' => $data['email'],
//                        'password' => $data['password'],
//                    ]);

        return redirect('/profile')->with('success', 'Профиль обновлен!');
    }


}
