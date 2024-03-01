<?php

namespace App\Livewire;

use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;

class Usercreate extends Component
{

    // needed to do sail artisan vendor:publish --tag=laravel-pagination
    // and
    //   {{ $users->links('vendor.pagination.tailwind') }}
    // in the blade file
    // see also
    //   https://livewire.laravel.com/docs/installation#publishing-the-configuration-file
    //  but the vendor.pagination.tailwind is the path to the pagination
    // file so reading round this would be good
    use WithPagination, WithoutUrlPagination, WithFileUploads;


    // never put anything public that you don't want to be exposed to the front end
    public $name;
    public $email;
    public $password;
    public $image;

    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function createUser()
    {
        $this->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:50',
            'image' => 'nullable|image|max:1024'
        ]);

        if ($this->image) {
            $imagePath = $this->image->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $usr = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'image' => $imagePath
        ]);

        // reset the form
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->image = null;
        $this->reset('image');


        // flash a message to the session
        session()->flash('success', 'User Created Successfully.');

        // dispatch event to refresh the user list
        $this->dispatch('user-created', $usr);
    }



    public function render()
    {
        $title = 'Doo Dar Band';
        $users = User::paginate(3);

        // define any secret data here rather than in public variables
        // if that is what you want to do
        $some_secret_data = 'this is a secret';

        return view('livewire.usercreate', [
            'title' => $title,
            'users' => $users
        ]);
    }
}
