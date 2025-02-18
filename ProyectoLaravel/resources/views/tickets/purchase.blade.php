@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Compra de Entradas</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tickets.store') }}">
            @csrf

            <div class="mb-4">
                <label for="event_id" class="block text-gray-700">Evento</label>
                <select name="event_id" id="event_id" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }} - {{ $event->date }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-gray-700">Tipo de Entrada</label>
                <select name="type" id="type" required class="w-full px-4 py-2 mt-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="presencial">Presencial</option>
                    <option value="virtual">Virtual</option>
                    <option value="gratuita">Gratuita (Solo alumnos)</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-xl hover:bg-blue-600 transition">Comprar Entrada</button>
        </form>
    </div>
</div>
@endsection
