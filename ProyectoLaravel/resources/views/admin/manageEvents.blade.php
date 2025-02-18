@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Gestión de Eventos</h1>

    <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-xl shadow mb-4 inline-block">Crear Evento</a>

    <table class="min-w-full bg-white rounded-xl shadow overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Título</th>
                <th class="py-3 px-6 text-left">Fecha</th>
                <th class="py-3 px-6 text-left">Ponente</th>
                <th class="py-3 px-6 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($events as $event)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $event->title }}</td>
                    <td class="py-3 px-6 text-left">{{ $event->date }}</td>
                    <td class="py-3 px-6 text-left">{{ $event->speaker->name }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-lg shadow mr-2">Editar</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-lg shadow" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $events->links() }}
    </div>
</div>
@endsection
