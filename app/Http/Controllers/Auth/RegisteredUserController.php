<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Events\Registered;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        app()->setLocale($request->user_locale);

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'company' => 'required|string|min:3|max:150',
            'position' => 'required|string|min:3|max:150',
            'country' => 'required',
            'phone' => 'required|string|min:10|max:16',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company' => $request->company,
            'position' => $request->position,
            'country_id' => $request->country,
            'phone' => $request->phone,
        ]);

        event(new Registered($user, $request->user_locale));
        Auth::login($user);

        if (isset($request->json) && $request->json) {
            return response()->json([
                "errors" => false,
                "user" => $user->id,
                "token" => csrf_token()
            ], 200);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
