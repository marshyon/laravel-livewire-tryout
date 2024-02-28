<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Todo;

class TodoList extends Component
{

    use WithPagination;

    #Rules('required|min:6|max:255')
    public $name;
    public $search;



    public function create() {


        // dd($this->name);
        // validate
        // $validated = $this->validateOnly('name');
        $validated = $this->validate([
            'name' => 'required|min:5|max:255'
        ]);
        // create
        Todo::create($validated);
        // clear input
        $this->reset('name');
        // flash message
        session()->flash('success', 'Todo created successfully.');
        // session()->flash('success', 'User Created Successfully.');


    }

    public function toggle($id) {
        // TODO :: add a try catch block
        // if the todo is not found due to being already
        // deleted, then catch the exception and display
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function delete($id) {
        // TODO :: add a try catch block
        // if the todo is not found due to being already
        // deleted, then catch the exception and display
        Todo::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.todo-list',[
            'todos' => Todo::latest()->where( 'name', 'like', "%{$this->search}%" )->paginate(5)
        ]);
    }
}
