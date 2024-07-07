<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('users.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
       // dd($request);
     /*  User::create($request->all());

       User::create([
        'fname' => $request->fname,
        'lname' => $request->lname,
        'type'=>$request->type,
        'phone'=>$request->phone,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
       User::create($request->all());*/
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
       // User::create($request->all());

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'type'=>$request->type,
            'phone'=>$request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

      //  Auth::login($user);
       // return redirect()->route('login');
      return redirect(RouteServiceProvider::HOME);
    }
}
