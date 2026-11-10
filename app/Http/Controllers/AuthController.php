<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('cms.dashboard'))
                    ->with('success', 'Bienvenido al Panel Administrativo CMS.');
            }

            return redirect()->intended(route('my.courses'))
                ->with('success', 'Has iniciado sesión correctamente.');
        }

        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::create([
            'name' => trim($validated['first_name'] . ' ' . $validated['last_name']),
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'role' => 'student',
            'avatar' => 'student3.jpg',
            'password' => Hash::make($validated['password']),
        ]);

        // Matricular automáticamente al nuevo estudiante en el curso inicial de bienvenida
        if ($firstCourse = Course::first()) {
            Enrollment::firstOrCreate([
                'user_id' => $user->id,
                'course_id' => $firstCourse->id,
            ], ['progress' => 0]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('my.courses')
            ->with('success', 'Tu cuenta ha sido creada exitosamente.');
    }

    public function updateProfile(Request $request)
    {
        /** @var User $user */
        $user = Auth::user() ?? User::where('role', 'student')->firstOrFail();

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'bio' => ['nullable', 'string', 'max:1000'],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->name = trim($validated['first_name'] . ' ' . $validated['last_name']);
        $user->email = $validated['email'];
        $user->bio = $validated['bio'] ?? $user->bio;

        if (!empty($validated['password']) && $validated['password'] !== '********') {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()->with('success', 'Tus datos de perfil han sido actualizados.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Has cerrado sesión correctamente.');
    }
}
