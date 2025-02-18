@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Panel de Administración</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-2xl shadow">
            <h2 class="text-lg font-semibold">Total de Eventos</h2>
            <p class="text-3xl mt-2">{{ $events->count() }}</p>
        </div>
        <div class="bg-white p-4 rounded-2xl shadow">
            <h2 class="text-lg font-semibold">Ponentes</h2>
            <p class="text-3xl mt-2">{{ $speakers->count() }}</p>
        </div>
        <div class="bg-white p-4 rounded-2xl shadow">
            <h2 class="text-lg font-semibold">Usuarios</h2>
            <p class="text-3xl mt-2">{{ $users->count() }}</p>
        </div>
        <div class="bg-white p-4 rounded-2xl shadow">
            <h2 class="text-lg font-semibold">Ingresos Totales</h2>
            <p class="text-3xl mt-2">${{ number_format($income, 2) }}</p>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-4">Gestión Rápida</h2>
        <a href="{{ route('admin.events') }}" class="bg-blue-500 text-white px-4 py-2 rounded-xl shadow mr-2">Eventos</a>
        <a href="{{ route('admin.speakers') }}" class="bg-green-500 text-white px-4 py-2 rounded-xl shadow mr-2">Ponentes</a>
        <a href="{{ route('admin.users') }}" class="bg-yellow-500 text-white px-4 py-2 rounded-xl shadow mr-2">Usuarios</a>
        <a href="{{ route('admin.income') }}" class="bg-purple-500 text-white px-4 py-2 rounded-xl shadow">Ingresos</a>
    </div>
</div>
@endsection
