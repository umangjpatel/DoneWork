<?php

namespace App\Http\Livewire;

use App\Task;
use Livewire\Component;

class Tasks extends Component
{

    public $newTask;
    public $countTasks;
    public $tasks;

    public function render()
    {
        $this->loadTasks();
        return view('livewire.tasks');
    }

    public function updated($field) {
        $this->validateOnly($field, [
           'newTask' => 'min:6|max:100'
        ]);
    }

    public function saveTask() {
        $validatedData = $this->validate([
            'newTask' => 'required|min:6|max:100'
        ]);

        Task::create([
            "task" => $validatedData['newTask']
        ]);
        $this->newTask = "";
        return view('livewire.tasks');
    }

    public function completeTask($id) {
        Task::find($id)->delete();
        return view('livewire.tasks');
    }

    public function pollCountTasks() {
        $this->countTasks = Task::all()->count();
    }

    private function loadTasks() {
        $this->tasks = Task::latest()->get();
    }
}
