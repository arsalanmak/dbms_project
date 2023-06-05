
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach($cars as $key => $car)
                    <x-post :car="$car" :wire:key="$car->id" />
                @endforeach
            </div>
        </div>
    </div>
