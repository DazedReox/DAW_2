@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md text-center">
        <h2 class="text-2xl font-bold mb-4">Verificación de Correo Electrónico</h2>
        <p class="text-gray-600 mb-4">Antes de continuar, por favor verifica tu correo electrónico con el enlace que te enviamos.</p>

        @if (session('resent'))
            <div class="mb-4 text-green-500">
                Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition">
                Reenviar Correo de Verificación
            </button>
        </form>

        <p class="mt-4 text-gray-600">Si ya verificaste tu correo, <a href="{{ route('login') }}" class="text-blue-500">inicia sesión aquí</a>.</p>
    </div>
</div>
@endsection
