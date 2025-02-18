@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" id="email" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox">
                    <span class="ml-2 text-gray-700">Recordarme</span>
                </label>

                <a href="#" class="text-blue-500 text-sm">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-xl hover:bg-blue-600 transition">Iniciar Sesión</button>
        </form>

        <p class="mt-4 text-center text-gray-600">¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-blue-500">Regístrate aquí</a></p>
    </div>
</div>
@endsection
