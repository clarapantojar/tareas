<section>
    <!-- inicio tabla tareas  -->
    <div class="max-w-full px-4">
        <button type="submit" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-purple-400 border rounded-md gap-x-2
            hover:bg-purple-700 hover:text-white dark:bg-gray-900 dark:text-gray-200 dark:boder-gray-700 dark:hover:bg-gray-800 focus:outline-none mb-4" wire:click="openCreateModal">
            <span>Nuevo</span>
        </button>
        <table class="table table-dashboard table-striped min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Título</th>
                    <th class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Descripción</th>
                    <th class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach ($tasks as $task)
                <tr>
                    <td class="px-4 py-4 text-sm whitespace-nonwrap"> {{ $task->title}} </td>
                    <td class="px-4 py-4 text-sm whitespace-nonwrap"> {{ $task->description}} </td>
                    <td class="px-4 py-4 text-sm whitespace-nonwrap">
                        <div class="flex items-center gap-x-2">
                        <button type="submit" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-green-400 border rounded-md gap-x-2
                        hover:bg-green-700 dark:bg-gray-900 dark:text-gray-200 dark:boder-gray-700 dark:hover:bg-gray-800 focus:outline-none" wire:click.prevent="openCreateModal({{ $task }})">
                            <span>Editar</span>
                        </button>
                        <button type="submit" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-red-400 border rounded-md gap-x-2
                        hover:bg-red-700 dark:bg-gray-900 dark:text-gray-200 dark:boder-gray-700 dark:hover:bg-gray-800 focus:outline-none" wire:click.prevent="deleteTask({{ $task }})">
                            <span>Borrar</span>
                        </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- end tabla tareas -->
    <!-- MODAL -->
    @if($modal)
    <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
        <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
            <div class="w-full">
            <div class="m-8 my-20 max-w-[400px] mx-auto">
                <div class="mb-8">
                <h1 class="mb-4 text-3xl font-extrabold">{{ isset($miTarea->id) ? 'Editar tarea' : 'Crear una nueva tarea'}}</h1>
                <form action="">
                    <!-- wire:model -> vincula los imputs con las variables que tenemos en el modelo -->
                    <div class="mb-4">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Titulo</label>
                        <input wire:model="title" type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 rounded-lg w-full" placeholder="Escribe aquí el título de la tarea">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Descripción</label>
                        <textarea wire:model="description" name="description" id="description" rows="3" class="bg-gray-50 border-gray-300 rounded-lg w-full" placeholder="Escribe aquí la descripción de la tarea"></textarea>
                    </div>
                </form>
                </div>
                <div class="flex items-center gap-x-2">
                <button class="p-3 bg-black rounded-full text-white w-full font-semibold" wire:click.prevent="createorUpdateTask">
                    {{ isset($miTarea->id) ? 'Actualizar' : 'Crear'}} tarea
                </button>
                <button class="p-3 bg-white border rounded-full w-full font-semibold" wire:click.prevent="closeCreateModal">Cancelar</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endif
    <!-- END MODAL -->
</section>