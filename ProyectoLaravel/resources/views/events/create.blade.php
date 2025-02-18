@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Crear Nuevo Evento</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('events.store') }}">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Título</label>
            <input type="text" name="title" id="title" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Descripción</label>
            <textarea name="description" id="description" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-gray-700">Fecha</label>
            <input type="date" name="date" id="date" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-4">
            <label for="time" class="block text-gray-700">Hora</label>
            <input type="time" name="time" id="time" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-4">
            <label for="speaker_id" class="block text-gray-700">Ponente</label>
            <select name="speaker_id" id="speaker_id" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
                @foreach ($speakers as $speaker)
                    <option value="{{ $speaker->id }}">{{ $speaker->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-xl hover:bg-blue-600 transition">Crear Evento</button>
    </form>
</div>
@endsection
