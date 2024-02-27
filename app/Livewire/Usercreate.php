<?php

namespace App\Livewire;
use App\Models\User;

use Livewire\Component;

class Usercreate extends Component
{
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

    // public function handleButtonClick()
    // {
    //     dump('doo dar band');
    // }

    public function createUser() {

        $this->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:50'
        ]);

        // dump($this->name);
        // dump($this->email);
        // dump($this->password);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
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
        $users = User::all();

        // define any secret data here rather than in public variables
        // if that is what you want to do
        $some_secret_data = 'this is a secret';

        return view('livewire.usercreate',[
            'title' => $title,
            'users' => $users
        ]);
    }

}
