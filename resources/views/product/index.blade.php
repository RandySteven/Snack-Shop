<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center text-3xl">
                        <b>Manage Product</b>
                    </div>
                    <table class="w-full text-center border-2 border-black">
                        <thead class="border-2 border-black">
                            <th class="border-2 border-black">Image</th>
                            <th class="border-2 border-black">Name</th>
                            <th class="border-2 border-black">Category</th>
                            <th class="border-2 border-black">Price</th>
                            <th class="border-2 border-black">Stock</th>
                            <th class="border-2 border-black">Update Stock</th>
                            <th class="border-2 border-black">Add to Cart</th>
                            @if (Auth::user()->hasRole('Admin'))
                                <th class="border-2 border-black">Action</th>
                            @endif
                        </thead>
                        <tbody class="border-2 border-black">
                            @foreach ($products as $product)
                                <tr class="border-2 border-black">
                                    <td class="border-2 border-black">
                                        <img src="{{ asset('storage/'.$product->image) }}" class="w-28 h-28 pl-4" alt="{{ $product->image }}">
                                    </td>
                                    <td class="border-2 border-black">
                                        {{ $product->name }}
                                    </td>
                                    <td class="border-2 border-black">
                                        {{ $product->category->category }}
                                    </td>
                                    <td class="border-2 border-black">Rp. {{ number_format($product->price, 2) }}</td>
                                    <td class="border-2 border-black">
                                        {{ $product->stock }}
                                    </td>
                                    <td class="text-center border-2 border-black">
                                        <a href="" class="bg bg-green-700 hover:bg-green-600 px-2 rounded text-white">Add Stock</a>
                                    </td>
                                    <td class="text-center border-2 border-black">
                                        <a href="" class="bg bg-green-700 hover:bg-green-600 px-2 rounded text-white">Add to Cart</a>
                                    </td>
                                    @if (Auth::user()->hasRole('Admin'))
                                        <td>
                                            <form action="{{ route('product.delete', $product) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-2 py-1 bg-red-700 hover:bg-red-600 text-white rounded">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @auth
                        @if (Auth::user()->hasRole('Admin'))
                            <div class="my-4">
                                @include('product.create')
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
