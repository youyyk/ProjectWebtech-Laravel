<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Phattarachai\LineNotify\Facade\Line;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'type' => ['required', 'string'],

        ]);

        if ($request->has('path')){
            $path = $request->file('path')->storeAs('public/images',$request->file('path')->getClientOriginalName());
        } else {
            $path = "public/images/noImage.jpg";
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'path' => $path,
        ]);

        event(new Registered($user));

        $text_line="\nมีการเพิ่ม user ใหม่\nประเภท ".$user->type."\nโดย ".Auth::user()->name;
        $image_line = $request->file('path');
        Line::imagePath($image_line)->send($text_line);
        return redirect()->route('users.index');
    }
}
