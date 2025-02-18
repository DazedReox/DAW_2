<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // Registro de usuarios
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirmation_token' => str_random(60),
        ]);

        // Enviar email de confirmación
        Mail::to($user->email)->send(new ConfirmationEmail($user));

        return response()->json(['message' => 'Usuario registrado. Por favor, confirme su correo.'], 201);
    }

    // Confirmación de correo
    public function confirmEmail($token)
    {
        $user = User::where('confirmation_token', $token)->firstOrFail();
        $user->confirmed = true;
        $user->confirmation_token = null;
        $user->save();

        return redirect('/login')->with('success', 'Correo confirmado, ahora puedes iniciar sesión.');
    }

    // Inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Inicio de sesión exitoso'], 200);
        }

        return response()->json(['error' => 'Credenciales inválidas'], 401);
    }

    // Cierre de sesión
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Sesión cerrada'], 200);
    }
}
