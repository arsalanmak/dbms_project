<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;

class Cars extends Component
{
    public $createShowModal = false;
    public $deleteSelectedCar;
    public $deleteModal = false;
    public $carId;
    public $car = [
        'title' => '',
        'n_plate' => '',
        'description' => '',
        'passenger' => '',
        'condition' => '',
        'status' => '',
        'rent' => '',
        'ac' => ''
    ];

    public function render() {
        return view('livewire.cars', [
            'cars'  => Car::all()
        ]);
    }

    protected $rules = [
        'car'               => 'required|array',
        'car.title'         => 'required|min:5',
        'car.n_plate'       => 'required|min:5',
        'car.description'   => 'nullable|string',
        'car.passenger'     => 'required|integer',
        'car.condition'     => 'required|integer',
        'car.rent'          => 'required|numeric',
        'car.ac'            => 'required|integer',
        'car.status'        => 'nullable|boolean'
    ];

    protected $messages = [
        'car.title' => 'Please insert car name which must have 5 charater',
        'car.n_plate' => 'Enter Number plate of your car',
        'car.rent' => 'Enter amount',
        'car.passenger' => 'Enter Number of passengers',
        'car.condition' => 'Please Select Any', 
        'car.ac' => 'Please Select Any',
    ];

    public function targetCarModel() {
        $this->resetValidation();
        $this->reset();
        $this->createShowModal = true;
    }

    public function editCarModel(Int $carId) {
        $this->carId = $carId;
        $this->car = Car::find($carId);
        $this->createShowModal = true;
    }

    public function store() {
        $this->validate();

        Car::create([
            'title'         => $this->car['title'],
            'n_plate'       => $this->car['n_plate'],
            'description'   => $this->car['description'],
            'passenger'     => $this->car['passenger'],
            'rent'          => $this->car['rent'],
            'ac'            => $this->car['ac'],
            'condition'     => $this->car['condition'],
            'status'        => $this->car['status']
        ]);

        $this->reset();
        $this->createShowModal = false;
        session()->flash('message', 'Your car register successfully.');
    }

    public function update() {
        $this->validate();

        $car = Car::find($this->car['id']);
        $carUpdated = $car->update([
            'title'         => $this->car['title'],
            'n_plate'       => $this->car['n_plate'],
            'description'   => $this->car['description'],
            'passenger'     => $this->car['passenger'],
            'rent'          => $this->car['rent'],
            'ac'            => $this->car['ac'],
            'condition'     => $this->car['condition'],
            'status'        => $this->car['status']
        ]);

        $this->reset();
        $this->createShowModal = false;
        session()->flash('message', 'Car updated successfully.');
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
        $car = Car::where('id', $carId)->first();

        $car->update([
            'status' => !$car->status  
        ]);
    }
}
