<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;

class ShowPosts extends Component
{
    public $car;

    public function mount(Car $car)
    {
        $this->car = $car;
    }

    public function render()
    {
        return view('livewire.show-posts', [
            'car' => $this->car,
        ]);
    }
}
