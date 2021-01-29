<x-app-layout>

    <x-slot name="title">
        Transactions History
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="text-center text-3xl">
                            <b>Transaction Detail</b>
                        </div>
                        <table class="w-full text-center border-2 border-black">
                            <thead class="border-2 border-black">
                                <th class="border-2 border-black">Image</th>
                                <th class="border-2 border-black">Name</th>
                                <th class="border-2 border-black">Category</th>
                                <th class="border-2 border-black">Product Price</th>
                                <th class="border-2 border-black">Quantity</th>
                                <th class="border-2 border-black">Price</th>
                            </thead>
                            <tbody class="border-2 border-black">
                                @foreach ($details as $detail)
                                    <tr class="border-2 border-black">
                                        <td class="border-2 border-black">
                                            <img src="{{ asset('storage/'.$detail->product->image) }}" class="w-28 h-28 pl-4" alt="{{ $detail->product->image }}">
                                        </td>
                                        <td class="border-2 border-black">
                                            {{ $detail->product->name }}
                                        </td>
                                        <td class="border-2 border-black">
                                            {{ $detail->product->category->category }}
                                        </td>
                                        <td class="border-2 border-black">Rp. {{ number_format($detail->product->price, 2) }}</td>
                                        <td class="border-2 border-black">
                                            {{ $detail->quantity }}
                                        </td>
                                        <td class="border-2 border-black">
                                        Rp. {{ number_format($detail->product->price * $detail->quantity, 2) }}
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
