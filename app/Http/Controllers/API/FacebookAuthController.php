<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function handleCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        }  catch (\Exception $e) {
            return redirect('/login');
        }


        // check if they're an existing user
//        $existingUser = User::where('email', $user->email)->first();
         $existingUser = User::where('provider_id', $user->id)->first();

        if($existingUser) {
            Auth::login($existingUser, true);
        } else {
            // create a new user
            $newUser = User::create([
                // 'name' => $user->name,
                'name' => $user->name,
                'email' => $user->email,
                'provider_id'=> $user->id,
                'photo' => $user->avatar,
                'password' => encrypt('123456dummy')
            ]);

            Auth::login($newUser, true);
        }

        return redirect()->to('/dashboard');

    }
}
