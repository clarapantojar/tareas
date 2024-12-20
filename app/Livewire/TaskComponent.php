<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskComponent extends Component
{
    public $tasks = [];
    public $title;
    public $description;
    // para el modal que abriremos para crear/actualizar una tarea nueva
    public $modal = false;
    public $miTarea = null;



    /*
        en esta función ponemos todo los datos que queramos obtener/rellenar en la clase que luego usará la vista/render
        SOLO SE EJECUTA UNA VEZ - al cargar por primera vez el componente (cuando recargamos la página también)
    */
    public function mount()
    {
        $this->tasks = $this->getTasks()->sortByDesc('id');
    }

    public function getTasks()
    {
        return Task::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.task-component');
    }

    public function openCreateModal(Task $task = null)
    {
        if($task){
            $this->miTarea = $task;
            $this->title = $task->title;
            $this->description = $task->description;
        }
        else{
            $this->clearFields();
        }
        $this->modal = true;
    }

    public function closeCreateModal()
    {
        $this->modal = false;
    }

    public function createorUpdateTask()
    {
        if($this->miTarea->id){
            $task = Task::find($this->miTarea->id);
            $task->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        }
        else{
            Task::create([
                'title' => $this->title,
                'description' => $this->description,
                'user_id' => auth()->user()->id,
            ]);
        }
        
        // la creación de la tarea se puede hacer de forma directa con Eloquent
        // Task::create(['title'=> $this->title, 'description'=>$this->description, 'user_id'=>auth()->user()->id]);
        // Eloquent también tiene el método updateOrCreate
        // Task::updateOrCreate(
        //     ['id' => $this->miTarea->id], //claves primarias -> si no existe un elemento con ella -> crea un elemento con los valores que se pasan abajo
        //     //si ya existe un elemento con la clave que pasamos actualiza ese registro con los valores que le pasamos abajo
        //     [
        //         'title' => $this->titulo,
        //         'description' => $this->description,
        //     ]
        // );

        // o con un nuevo elemento de la clase tarea --> LAS DOS FORMAS SON VÁLIDAS
        // $newTask = new Task();
        // $newTask->title = $this->title;
        // $newTask->description = $this->description;
        // $newTask->user_id = auth()->user()->id;
        // $newTask->save();

        $this->clearFields();
        $this->modal = false;
        //recargar la lista de tareas, para que aparezca la última tarea creada
        $this->tasks = $this->getTasks()->sortByDesc('id');
    }
    
    public function deleteTask(Task $task)
    {
        $task->delete();
        $this->tasks = $this->getTasks()->sortByDesc('id');
    }

    // Limpiar los campos básicos antes de crear una tarea -> asegurarnos de que los campos son nuevos
    private function clearFields()
    {
        $this->title = '';
        $this->description = '';
        $this->miTarea = null;
    }

}
