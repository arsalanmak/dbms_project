@push('style')
  <style>
    /* Toggle A */
    input:checked ~ .dot {
      transform: translateX(100%);
      background-color: #7a741d;
    }
  </style>
@endpush

<div class="p-6">
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Available Cars') }}
    </h2>
  </x-slot>

  <div class="flex flex-row justify-center items-center">
      <div>
        @if (session()->has('message'))
          <div class="bg-green-300 border border-green-300 text-green-500 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            </span>
          </div>
        @endif
      </div>
      
      @if(auth()->user()->roles->first()->slug == 'driver')
        <div class="flex items-centre justify-end px-4 py-3 sm:py-6 text-right">
          <x-button wire:click="targetCarModel">
            {{ __('Create') }}
          </x-button>
        </div>
      @endif
  </div>
    
  {{-- Modal Form --}}
  <x-dialog-modal wire:model="createShowModal">
      <x-slot name="title">
          {{ __('Register new car') }} {{ $carId }}
      </x-slot>

      <x-slot name="content">
          <div class="mt-4">
              <div class="flex flex-row">
                  <div class="mr-1 w-full">
                      <div class="mt-4">
                          <x-label for="title" value="{{ __('Title') }}" />
                          <x-input id="title" class="block mt-1 w-full py-2 px-2 border border-gray-300" type="text" wire:model.defer="car.title" />
                          <x-input-error for="car.title" class="mt-2" />
                      </div>
                  </div>
                  
                  <div class="ml-1 w-full">
                      <div class="mt-4">
                          <x-label for="n_plate" value="{{ __('Number Plate') }}" />
                          <x-input id="n_plate" class="block mt-1 w-full py-2 px-2 border border-gray-300" type="text" wire:model.defer="car.n_plate" />
                          <x-input-error for="car.n_plate" class="mt-2" />
                      </div>
                  </div>
              </div>
          </div>
          <div class="mt-4">
              <div class="flex flex-row">
                  <div class="ml-1 w-full">
                      <x-label for="condition" value="{{ __('Condition') }}" />
                      <select id="condition" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="car.condition">
                          <option>-- select --</option>
                          <option value="1">Good</option>
                          <option value="2">Normal</option>
                          <option value="3">Poor</option>
                      </select>                
                      <x-input-error for="car.condition" class="mt-2" />
                  </div>
                  <div class="ml-1 w-full">
                      <x-label for="ac" value="{{ __('AC') }}" />
                      <select id="ac" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="car.ac">
                          <option>-- select --</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                      </select>                
                      <x-input-error for="car.ac" class="mt-2" />
                  </div>
              </div>
          </div>
          <div class="mt-4">
              <div class="flex flex-row">
                  <div class="mr-1 w-full">
                      <x-label for="passenger" value="{{ __('Passenger (Capicity)') }}" />
                      <x-input id="passenger" class="block mt-1 w-full py-2 px-2 border border-gray-300" type="number" wire:model.defer="car.passenger" />
                      <x-input-error for="car.passenger" class="mt-2" />
                  </div>
                  <div class="mr-1 w-full">
                      <x-label for="rent" value="{{ __('Rent Amount') }}" />
                      <x-input id="rent" class="block mt-1 w-full py-2 px-2 border border-gray-300" type="number" wire:model.defer="car.rent" placeholder="00.01" />
                      <x-input-error for="car.rent" class="mt-2" />
                  </div>
              </div>
          </div>
          <div class="mt-4">
              <x-label for="description" value="{{ __('Description (Optional)') }}" />
              <x-textarea class="w-full border border-gray-300 px-2 py-2" id="description" wire:model.defer="car.description" />
              <x-input-error for="car.description" class="mt-2" />
          </div>
  
          <div class="mt-4 flex">
              <input id="status" type="checkbox" wire:model="car.status" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
              <label for="status" class="ml-2 block text-sm text-gray-900">Published</label>                
              <x-input-error for="car.status" class="mt-2" />
          </div>
      </x-slot>

      <x-slot name="footer">
        <div class="items-center">
          <x-secondary-button wire:click="$toggle('createShowModal')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
          </x-secondary-button>

          @if($carId)
            <x-button class="ml-3" wire:click="update" wire:loading.attr="disabled">
              {{ __('Update') }}
            </x-button>
          @else
            <x-button class="ml-3" wire:click="store" wire:loading.attr="disabled">
              {{ __('Create') }}
            </x-button>
          @endif
        </div>
      </x-slot>
  </x-dialog-modal>

  {{-- Delete Modal --}}
  <x-dialog-modal wire:model="deleteModal">
      <x-slot name="title">
          {{ __('Booking Confirmation') }}
      </x-slot>

      <x-slot name="content">
          Are you sure you want to Book this Car?
      </x-slot>

      <x-slot name="footer">
          <div class="items-center">
              <x-secondary-button wire:click="$toggle('deleteModal')" wire:loading.attr="disabled">
                  {{ __('Cancel') }}
              </x-secondary-button>
              
              <x-button class="ml-3" wire:click="deleteConfirmed" wire:loading.attr="disabled">
                  {{ __('Book Now') }}
              </x-button>
          </div>
      </x-slot>
  </x-dialog-modal>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach($cars as $key => $car)
                <div class="px-6 py-5 mt-3 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-row justify-between">
                        <div class="items-center">
                          <div class="flex items-center">
                            <img src="{{ asset('images/car_post_icon.svg') }}" width="30px">
                            <h2 class="ml-3 text-xl font-semibold text-gray-900">
                              <a href="#">{{ $car->title }}</a>
                            </h2>
                          </div>
                          <ul class="mt-4 text-gray-500 text-sm leading-relaxed">
                            <li>Number Plate: <strong> {{ $car->n_plate}}</strong></li>
                            <li>Capacity: <strong> {{ $car->passenger}}</strong></li>
                            <li>AC: <strong> {!! $car->ac ? "Yes" : "No" !!}</strong></li>
                            <li>Condition: 
                                <strong> 
                                    @if($car->condition == 1) Good @endif
                                    @if($car->condition == 2) Normal @endif
                                    @if($car->condition == 3) Poor @endif
                                </strong>
                            </li>
                            <li>Rent per hour: <strong> ${{ $car->price }}</strong></li>
                            <li>Status: <strong >{!! !$car->status ? "Temporary Unavailable" : "Available"!!}</strong></li>
                          </ul>
                        </div>
                        <div class="my-3 flex flex-col justify-between">
                            @if(auth()->user()->roles->first()->slug == 'customer')
                                @if($car->status)
                                    <x-button  wire:click="targetCarModel">
                                      {{ __('Book Now') }}
                                    </x-button>
                                @endif
                            @elseif(auth()->user()->roles->first()->slug == 'driver')
                                <div>
                                    <x-button  wire:click="editCarModel({{ $car->id }})">
                                        {{ __('Car Edit') }}
                                    </x-button>
                                </div>
                                <label for="toogleA" class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input id="toogleA" type="checkbox" {!! $car->status ? "checked" : "" !!} class="sr-only" wire:change="carStatusUpdate({{ $car->id }})" />
                                        <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                    </div>
                                </label>
                            @endif
                        </div>
                    </div>
                </div>
        @endforeach
      </div>
    </div>
  </div>
</div>