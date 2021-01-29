<x-app-layout>

    <x-slot name="title">
        Transactions Data
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
                            <th class="border-2 border-black">Transaction Date</th>
                            <th class="border-2 border-black">Actions</th>
                        </thead>
                        <tbody class="border-2 border-black">
                            @foreach ($transactions as $transaction)
                                <tr class="border-2 border-black">
                                    <td class="border-2 border-black">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border-2 border-black">
                                        {{ $transaction->created_at->format('d M, Y') }}
                                    </td>
                                    <td class="border-2 border-black py-2">
                                        <a href="" class="px-2 py-1 text-white rounded bg-yellow-700 hover:bg-yellow-600">See Details</a>
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
