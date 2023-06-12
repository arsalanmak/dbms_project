<div>
    @if(auth()->user()->roles->first()->slug == 'admin')
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-black leading-tight bg-yellow-500">
            Hey {{ auth()->user()->name }}, Welcome to Dashboard
        </h2>
    </x-slot>
    @endif

    <div class="container mx-auto px-4 sm:px-8">
      <div class="py-8">
        <div>
          {{-- <h2 class="text-2xl font-semibold leading-tight">Users</h2> --}}
          </div>
          <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden" >
              <table class="min-w-full leading-normal">
                <thead>
                  <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Role
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                      Status
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                      Account Created
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex">
                        <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-full h-full rounded-full" src="{{ $user->profile_photo_url }}" />
                        </div>
                        <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">
                            {{ $user->name }}
                            </p>
                            <p class="text-gray-600 whitespace-no-wrap">{{ $user->email }}</p>
                        </div>
                        </div>
                      </td>
                      <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if(!$user->roles->isEmpty())
                          <p class="text-gray-900 whitespace-no-wrap">{{ $user->roles->first()->title }}</p>
                        @else
                          <p class="text-gray-600 whitespace-no-wrap">Not Assigned</p>
                        @endif
                      </td>
                      <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if($user->email_verified_at)
                          <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full" ></span>
                            <span class="relative">Verified Email</span>
                          </span>
                        @else
                          <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full" ></span>
                            <span class="relative">Unverified Email</span>
                          </span>
                        @endif
                      </td>
                      <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <p class="text-gray-900 whitespace-no-wrap">{{ $user->created_at->format('d M, Y') }}</p>
                      </td>                      
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    {{-- <div class="flex flex-col mt-10">
        <div class="overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border overflow-hidden dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase">Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            
                            @if($users)
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black dark:text-black">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black">{{ $user->email }}</td>
                                        @if(!$user->roles->isEmpty())
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black">{{ $user->roles->first()->title }}</td>
                                        @else
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black"> Role Not assigned </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</div>
