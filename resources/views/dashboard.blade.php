<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl text-purple-800">Bienvenido al gestor de tareas</h1>
                    {{ Auth::user()->name}}
                    <p>Tareas registradas: {{ Auth::user()->tasks->count()}}</p>
                    <p>Titulo 1 tarea: {{ Auth::user()->tasks->find(1)->title}}</p>
                    <p>para sacar todas las tareas del usuario -> foreach</p>
                    <!-- la variable tasks viene de la función del controlador - queda más limpio y en la ruta vemos cómo llamamos al controlador
                     esto es el método tradicional con MVC -->
                    @foreach($tasks as $task)
                        <p class="text-purple-800 font-bold"> {{$task->title}}</p>
                        <p class="text-purple-500"> {{$task->description}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
