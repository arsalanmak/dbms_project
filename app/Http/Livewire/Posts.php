<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        return view('livewire.posts', [
            'cars'  => Car::all()
        ]);
    }
}
