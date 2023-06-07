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
                    <li>Status: <strong >{!! !$car->status ? "Temporary Unavailable" : "Available" !!}</strong></li>
                </ul>
                
                {{-- <p class="mt-4 text-sm">
                    <a href="{{ route('car.detail', $car->id) }}" class="inline-flex items-center font-semibold text-indigo-700">
                        Book car for me
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p> --}}
            </div>
        </div>
    </div>
</a>




