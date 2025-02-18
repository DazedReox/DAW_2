@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Eventos</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($events as $event)
            <div class="bg-white p-4 rounded-2xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                <p class="text-gray-600 mb-2">{{ $event->date }} - {{ $event->time }}</p>
                <p class="text-gray-700 mb-4">{{ Str::limit($event->description, 100) }}</p>
                <a href="{{ route('events.show', $event->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-600 transition">Ver Detalles</a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $events->links() }}
    </div>
</div>
@endsection
