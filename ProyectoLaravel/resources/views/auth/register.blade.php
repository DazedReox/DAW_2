@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Registro de Usuario</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre Completo</label>
                <input type="text" name="name" id="name" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" id="email" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-xl hover:bg-blue-600 transition">Registrarse</button>
        </form>

        <p class="mt-4 text-center text-gray-600">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-blue-500">Inicia sesión aquí</a></p>
    </div>
</div>
@endsection
