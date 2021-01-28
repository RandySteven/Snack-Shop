@if($carts->count()!=0)
<div class="text-center text-3xl">
    <b>Cart</b>
</div>
<table class="w-full text-center border-2 border-black">
    <thead class="border-2 border-black">
        <th class="border-2 border-black">Image</th>
        <th class="border-2 border-black">Name</th>
        <th class="border-2 border-black">Category</th>
        <th class="border-2 border-black">Product Price</th>
        <th class="border-2 border-black">Quantity</th>
        <th class="border-2 border-black">Price</th>
        <th class="border-2 border-black">Action</th>
    </thead>
    <tbody class="border-2 border-black">
        @foreach ($carts as $cart)
            <tr class="border-2 border-black">
                <td class="border-2 border-black">
                    <img src="{{ asset('storage/'.$cart->product->image) }}" class="w-28 h-28 pl-4" alt="{{ $cart->product->image }}">
                </td>
                <td class="border-2 border-black">
                    {{ $cart->product->name }}
                </td>
                <td class="border-2 border-black">
                    {{ $cart->product->category->category }}
                </td>
                <td class="border-2 border-black">Rp. {{ number_format($cart->product->price, 2) }}</td>
                <td class="border-2 border-black">
                    {{ $cart->quantity }}
                </td>
                <td class="border-2 border-black">
                   Rp. {{ number_format($cart->product->price * $cart->quantity, 2) }}
                </td>
                <td class="border-2 border-black">
                    <form action="{{ route('add.delete', $cart) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-2 py-1 bg-red-700 hover:bg-red-600 text-white rounded">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<form action="{{ route('transaction.store') }}" method="POST">
    @csrf
    <button type="submit" class="bg-blue-500 px-2 py-2 rounded hover:bg-blue-400 text-white">Check Out</button>
</form>
@endif

