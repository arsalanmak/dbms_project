<div>
    @if(auth()->user()->roles->first()->slug == 'admin')
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-black leading-tight bg-yellow-500">
            Hey {{ auth()->user()->name }}, Welcome to Dashboard
        </h2>
    </x-slot>
    @endif
    
    <div class="flex flex-col mt-10">
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black">{{ $user->roles->first()->title }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
