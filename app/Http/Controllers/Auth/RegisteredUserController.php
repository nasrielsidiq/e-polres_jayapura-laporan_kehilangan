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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20', 'unique:'.User::class],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'province_code' => ['nullable', 'string', 'exists:indonesia_provinces,code'],
            'city_code' => ['nullable', 'string', 'exists:indonesia_cities,code'],
            'district_code' => ['nullable', 'string', 'exists:indonesia_districts,code'],
            'village_code' => ['nullable', 'string', 'exists:indonesia_villages,code'],
            'alamat' => ['nullable', 'string', 'max:500'],
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'province_code' => $request->province_code,
            'city_code' => $request->city_code,
            'district_code' => $request->district_code,
            'village_code' => $request->village_code,
            'alamat' => $request->alamat,
        ]);

        $user->assignRole('pelapor');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
