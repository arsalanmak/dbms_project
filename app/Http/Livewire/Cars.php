<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;

class Cars extends Component
{
    public $createShowModal = false;

    public $carId;
    public $car;
    

    public $deleteSelectedCar;
    public $deleteModal = false;

    public function render() {
        return view('livewire.cars', [
            'cars'  => Car::all()
        ]);
    }

    protected $rules = [
        'car'               => 'required|array',
        'car.name'          => 'required|min:5',
        'car.nPlate'        => 'required|min:5',
        'car.description'   => 'nullable|string',
        'car.rent'          => 'required|numeric',
        'car.passenger'     => 'required|integer',
        'car.condition'     => 'required|integer',
        'car.ac'            => 'required|integer',
    ];

    protected $messages = [
        'car.name' => 'Please insert car name which must have 5 charater',
        'car.nPlate' => 'Enter Number plate of car',
        'car.rent' => 'Enter amount',
        'car.passenger' => 'Enter Number of passengers',
        'car.condition' => 'Please Select Any', 
        'car.ac' => 'Please Select Any',
    ];

    public function targetCarModel() {
        $this->resetValidation();
        $this->reset();
        $this->createShowModal = true;
        dd($this->carId);
    }


    public function store() {
        $this->validate();

        Car::create([
            'title'         => $this->car['name'],
            'n_plate'       => $this->car['nPlate'],
            'description'   => isset($this->car['description']) ? $this->car['description'] : null,
            'passenger'     => $this->car['passenger'],
            'price'         => $this->car['rent'],
            'ac'            => $this->car['ac'],
            'condition'     => $this->car['condition'],
            'status'        => $this->car['status']
        ]);

        $this->reset();
        $this->createShowModal = false;
        session()->flash('message', 'Your car register successfully.');
    }

    public function deleteShowModal($carId) {
        $this->deleteSelectedCar = Car::find($carId);
        $this->deleteModal = true;
    }

    public function deleteConfirmed() {
        Car::find($this->deleteSelectedCar->id)->delete();
        $this->deleteModal = false;
    }

    public function carStatusUpdate(int $carId) {
        $car = Car::where('id', $carId)
            ->first();

        $car->update([
            'status' => !$car->status  
        ]);
    }
}
