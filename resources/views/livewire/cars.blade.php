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
                    {{-- <strong class="font-bold">Holy smokes!</strong> --}}
                    <span class="block sm:inline">{{ session('message') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    </span>
                </div>
            @endif
        </div>
        
        <div class="flex items-centre justify-end px-4 py-3 sm:py-6 text-right">
            <x-button wire:click="targetCarModel">
                {{ __('Create') }}
            </x-button>
        </div>
    </div>
    
    {{-- Modal Form --}}
    <x-dialog-modal wire:model="createShowModal">
        <x-slot name="title">
            {{ __('Register new car') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <div class="flex flex-row">
                    <div class="mr-1 w-full">
                        <div class="mt-4">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" wire:model.defer="car.name" />
                            <x-input-error for="car.name" class="mt-2" />
                        </div>
                    </div>
                    
                    <div class="ml-1 w-full">
                        <div class="mt-4">
                            <x-label for="nPlate" value="{{ __('Number Plate') }}" />
                            <x-input id="nPlate" class="block mt-1 w-full" type="text" wire:model.defer="car.nPlate" />
                            <x-input-error for="car.nPlate" class="mt-2" />
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
                        <x-input id="passenger" class="block mt-1 w-full" type="number" wire:model.defer="car.passenger" />
                        <x-input-error for="car.passenger" class="mt-2" />
                    </div>
                        
                    <div class="mr-1 w-full">
                        <x-label for="rent" value="{{ __('Rent Amount') }}" />
                        <x-input id="rent" class="block mt-1 w-full" type="number" wire:model.defer="car.rent" step="00.01" placeholder="00.01" />
                        <x-input-error for="car.rent" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <x-label for="description" value="{{ __('Description (Optional)') }}" />
                <x-textarea class="w-full" id="description" wire:model.defer="car.description" />
                <x-input-error for="car.description" class="mt-2" />
            </div>
    
            <div class="mt-4 flex">
                <input id="checkbox" wire:model="car.status" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="checkbox" class="ml-2 block text-sm text-gray-900">Published</label>                
                <x-input-error for="car.status" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="items-center">
                <x-secondary-button wire:click="$toggle('createShowModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
    
                {{-- @if ($modelId)
                    <x-button class="ml-3" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Update') }}
                    </x-button>
                @else --}}
                    <x-button class="ml-3" wire:click="store" wire:loading.attr="disabled">
                        {{ __('Create') }}
                    </x-button>
                {{-- @endif --}}
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
                    <a href="#" >
                        <div class="mt-3 overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="bg-gray-200 bg-opacity-25 grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                                <div>
                                    <div class="flex items-center">
                                        <img src="{{ asset('images/car_post_icon.svg') }}" width="30px">
                                        <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                            <a href="#">{{ $car->title }}</a>
                                        </h2>
                                    </div>

                                    <ul class="mt-4 text-gray-500 text-sm leading-relaxed">
                                        <li>Capicity: <strong> {{ $car->passenger}}</strong></li>
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
                                <br>
                                <x-button  wire:click="deleteShowModal({{ $car->id }})">
                                    {{ __('Book Now') }}
                                </x-button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>