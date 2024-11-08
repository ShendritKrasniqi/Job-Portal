<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();

            if (!$user->getEmail() || !$user->getName()) {
                return redirect()->route('login')->withErrors(['error' => 'Invalid user data received.']);
            }

            $is_user = User::where('email', $user->getEmail())->first();

            if (!$is_user) {
                $saveUser = User::create([
                    'google_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName() . '@' . $user->getId())
                ]);
            } else {
                $saveUser = $is_user;
                $saveUser->update(['google_id' => $user->getId()]);
            }

            Auth::login($saveUser);
            return redirect()->route('/home'); // Change 'home' to your intended route name
        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('login')->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }
}