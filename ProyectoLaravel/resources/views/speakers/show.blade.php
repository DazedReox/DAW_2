@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ $event->title }}</h1>

        <p class="text-gray-600 mb-2"><strong>Fecha:</strong> {{ $event->date }} - {{ $event->time }}</p>
        <p class="text-gray-600 mb-4"><strong>Tipo:</strong> {{ ucfirst($event->type) }}</p>

        <p class="text-gray-700 mb-4">{{ $event->description }}</p>

        <h2 class="text-xl font-semibold mb-2">Ponente</h2>
        <div class="flex items-center mb-4">
            <img src="{{ asset('storage/' . $event->speaker->photo) }}" alt="{{ $event->speaker->name }}" class="w-16 h-16 rounded-full mr-4">
            <div>
                <p class="text-lg font-bold">{{ $event->speaker->name }}</p>
                <p class="text-gray-500">{{ $event->speaker->expertise }}</p>
                <a href="{{ $event->speaker->social_links }}" target="_blank" class="text-blue-500">Perfil Social</a>
            </div>
        </div>

        <a href="{{ route('tickets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-600 transition">Comprar Entrada</a>
    </div>
</div>
@endsection
