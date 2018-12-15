<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Notifications\SignupActivate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

//use Laravolt\Avatar\Facade as Avatar;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'user_phone_number' => 'required|min:5|numeric'
        ]);
        $user = new User([
            'user_id' => rand(1, 999),
            'user_name' => $request->user_name,
            'email' => $request->email,
            'address_id' => '1',
            'user_phone_number' => $request->user_phone_number,
            'password' => bcrypt($request->password),
            'activation_token' => str_random(60)
        ]);
        $user->save();

        $avatar = (new \Laravolt\Avatar\Avatar)->create($user->user_name)->getImageObject()->encode('png');
        Storage::put('/public/avatars/' . $user->id . '/avatar.png', (string)$avatar);


        // Create the default image URL:
//        $avatar = (new \Laravolt\Avatar\Avatar)->create($user->name);
//
//        // Save it using Storage instead of Avatar::save()
//        $image = $avatar->getImageObject()->encode('png');
//        Storage::put('/storage/avatars/' . $user->id . '/avatar.png', $image->stream('png'));

        $user->roles()->attach(Role::where('name', 'client')->first());

        $user->notify(new SignupActivate($user));
        return response()->json([
            'message' => 'Successfully created user!',
            'stats' => 'true'
        ], 201);
    }


    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.',
                'stats' => 'false'
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        return response()->json(['message' => 'Successfully activated user!',
            'stats' => 'true', $user], 200);
    }

    /**
     * Login user and create token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [string] access_token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        $credentials['active'] = 1;
        $credentials['deleted_at'] = null;

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Account is not activated, check the mail',
                'stats' => 'false'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'stats' => 'true',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out',
            'stats' => 'true'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserAccount(Request $request)
    {
//        $request->user();
        $currentUser = $request->user();
        $id = $currentUser->id;
        $user = User::findOrFail($id);

        if ($request->has('user_id')) {
            $user->user_id = $request->input('user_id');


        }
        if ($request->has('address_id')) {
            $user->address_id = $request->input('address_id');

        }
        if ($request->has('user_name')) {
            $user->user_name = $request->input('user_name');

        }
        if ($request->has('email')) {
            $request->validate([
                'email' => 'required|string|email'
            ]);
            $user->email = $request->input('email');
        }
        if ($request->has('user_phone_number')) {
            $user->user_phone_number = $request->input('user_phone_number');
        }
        if ($request->has('user_other_details')) {
            $user->user_other_details = $request->input('user_other_details');

        }

//
//        $emailCheck = ($request->input('email') != '') && ($request->input('email') != $user->email);
//
//        if ($user->name != $request->input('name')) {
//
//        } else {
//
//        }
//        if ($emailCheck) {
//
//        } else {
//
//        }
//        $user->name = $request->input('name');
//        $user->first_name = $request->input('first_name');
//        $user->last_name = $request->input('last_name');
//
        $user->save();
        return response()->json($user);
    }

    public function update_avatar(Request $request)
    {
        $currentUser = $request->user();
        $id = $currentUser->id;
        $user = User::findOrFail($id);

        $request->validate([
            'Avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $avatarName1 = 'avatar' . time() . $request->Avatar->getClientOriginalName();
        $avatarName = str_replace(' ', '_', $avatarName1);
        if ($request->hasFile('Avatar')) {
//            echo("file" . $avatarName);
            //$request->avatar->move('avatars',$avatarName);
            $request->Avatar->move(public_path('/avatars/' . $user->id), $avatarName);

        }

//        $user = Auth::user();
//
//        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
//
//        $request->avatar->storeAs('avatars',$avatarName);
//
        $user->user_avatar = $avatarName;
        $user->save();

        return response()->json($user);

    }
}
