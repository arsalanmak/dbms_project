<x-app-layout>
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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase">Age</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase">Address</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-black uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black dark:text-black">John Brown</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black">45</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black">New York No. 1 Lake Park</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black dark:text-black">Jim Green</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black">27</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black">London No. 1 Lake Park</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black dark:text-black">Joe Black</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black">31</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-black">Sidney No. 1 Lake Park</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="w-full sm:px-6 lg:px-8">
            <table class="table-fixed w-full">
                <thead>
                    <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Email</th>
                    <th class="text-left">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Arsalan</td>
                        <td>Email</td>
                        <td>Time</td>
                    </tr>
                    <tr>
                        <td>Hussain</td>
                        <td>Email</td>
                        <td>Time</td>
                    </tr>
                    <tr>
                        <td>Hammad</td>
                        <td>Email</td>
                        <td>Time</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
</x-app-layout>
