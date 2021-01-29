<x-app-layout>

    <x-slot name="title">
        Manage Products
    </x-slot>

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
                                        <a href="{{ route('category.show', $product->category) }}">
                                            {{ $product->category->category }}
                                        </a>
                                    </td>
                                    <td class="border-2 border-black">Rp. {{ number_format($product->price, 2) }}</td>
                                    <td class="border-2 border-black">
                                        {{ $product->stock }}
                                    </td>
                                    <td class="text-center border-2 border-black">
                                        <a href="" class="modal-open bg bg-green-700 hover:bg-green-600 px-2 rounded text-white">Add Stock</a>
                                    </td>
                                    <td class="text-center border-2 border-black">
                                        <a href="" class="modal-open bg bg-green-700 hover:bg-green-600 px-2 rounded text-white">Add to Cart</a>
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
                                <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                                    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                                      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                        </svg>
                                        <span class="text-sm">(Esc)</span>
                                      </div>

                                      <!-- Add margin if you want to see some of the overlay behind the modal-->
                                      <div class="modal-content py-4 text-left px-6">
                                        <!--Title-->
                                        <div class="flex justify-between items-center pb-3">
                                          <p class="text-2xl font-bold">How Many Items do you want to add to cart</p>
                                          <div class="modal-close cursor-pointer z-50">
                                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                            </svg>
                                          </div>
                                        </div>

                                        <!--Body-->
                                        <div>Add Cart</div>
                                        <form action="{{ route('add.cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="number" name="quantity" class="w-full" id="">
                                            <button type="submit">Add</button>
                                        </form>
                                        <div class="mt-10">Add Stock</div>
                                        <form action="{{ route('product.add.stock', $product) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="stock" class="w-full" id="">
                                            <button type="submit">Add</button>
                                        </form>

                                        <!--Footer-->
                                        <div class="flex justify-end pt-2">
                                          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Action</button>
                                          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
                                        </div>

                                      </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                    @auth
                        @if (Auth::user()->hasRole('Admin'))
                            <div class="my-4">
                                @include('product.create')
                            </div>
                        @endif

                        <div class="my-4">
                            @include('product.cart.index')
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
