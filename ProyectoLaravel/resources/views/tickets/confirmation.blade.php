@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md text-center">
        <h2 class="text-2xl font-bold mb-4">Confirmación de Registro</h2>
        <p class="text-gray-600 mb-4">Tu registro ha sido completado con éxito.</p>
        <p class="text-gray-600 mb-4">Se ha enviado un comprobante de tu inscripción a tu correo electrónico.</p>

        <a href="{{ route('home') }}" class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition">
            Volver al Inicio
        </a>
    </div>
</div>
@endsection
