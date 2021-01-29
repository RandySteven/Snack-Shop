<x-app-layout>

    <x-slot name="title">
        Manage Staff
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center text-3xl">
                        <b>Staff</b>
                    </div>
                    <table class="w-full text-center border-2 border-black">
                        <thead class="border-2 border-black">
                            <th class="border-2 border-black">No</th>
                            <th class="border-2 border-black">Image</th>
                            <th class="border-2 border-black">Name</th>
                            <th class="border-2 border-black">Role</th>
                            <th class="border-2 border-black">Salary</th>
                            <th class="border-2 border-black">Phone</th>
                            <th class="border-2 border-black">Address</th>
                            <th class="border-2 border-black">Transactions</th>
                            <th class="border-2 border-black">Action</th>
                        </thead>
                        <tbody class="border-2 border-black">
                            @foreach ($staffs as $staff)
                                <tr class="border-2 border-black">
                                    <td class="border-2 border-black">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border-2 border-black pl-5">
                                        <img src="{{ asset('storage/'.$staff->photo) }}" alt="{{ $staff->photo }}" class="w-32 h-32">
                                    </td>
                                    <td class="border-2 border-black">
                                        {{ $staff->name }}
                                    </td>
                                    <td class="border-2 border-black">
                                        @foreach ($staff->where('id', $staff->id)->with('roles')->first()->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td class="border-2 border-black">
                                       Rp. {{ number_format($staff->salary, 2) }}
                                    </td>
                                    <td class="border-2 border-black">
                                        {{ $staff->phone }}
                                    </td>
                                    <td class="border-2 border-black">
                                        {{ $staff->address }}
                                    </td>
                                    <td class="border-2 border-black">
                                        <a href="" class="px-2 py-1 text-white bg-green-600 hover:bg-green-500 rounded">Transactions History</a>
                                    </td>
                                    <td class="border-2 border-black">
                                        <a href="{{ route('staff.edit', $staff) }}" class="px-2 py-1 text-white bg-green-600 hover:bg-green-500 rounded">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
