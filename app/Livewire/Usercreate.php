<?php

namespace App\Livewire;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

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
    use WithPagination;


    // never put anything public that you don't want to be exposed to the front end
    public $name;
    public $email;
    public $password;

    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function createUser() {

        $this->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:50'
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        // reset the form
        $this->name = '';
        $this->email = '';
        $this->password = '';


        // flash a message to the session
        session()->flash('success', 'User Created Successfully.');

    }

    public function createRandomUser() {
        // create a random string using faker of a username
        $name = \Faker\Factory::create()->name;
        // create a random email using faker
        $email = \Faker\Factory::create()->email;
        // create a new user using the User model
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => 'password123'
        ]);
    }


    public function render()
    {
        $title = 'Doo Dar Band';
        $users = User::paginate(3);

        // define any secret data here rather than in public variables
        // if that is what you want to do
        $some_secret_data = 'this is a secret';

        return view('livewire.usercreate',[
            'title' => $title,
            'users' => $users
        ]);


    }

}
