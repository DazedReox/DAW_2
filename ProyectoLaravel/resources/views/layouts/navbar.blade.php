<nav class="bg-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-bold text-blue-500">Jornadas de Videojuegos</a>

        <div class="flex space-x-4">
            <a href="{{ route('events.index') }}" class="text-gray-700 hover:text-blue-500">Eventos</a>
            <a href="{{ route('tickets.index') }}" class="text-gray-700 hover:text-blue-500">Mis Entradas</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-500">Admin</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-blue-500">Cerrar Sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500">Registrarse</a>
            @endauth
        </div>
    </div>
</nav>
