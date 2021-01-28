<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="border-2 px-2 border-red-700 ">
    @csrf
    <div class="my-4">
        <x-label class="text-blue-600" for="name" :value="__('Name')" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
    </div>
    <div class="my-4">
        <x-label class="text-blue-600" for="price" :value="__('Price')" />
        <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus />
    </div>
    <div class="my-4">
        <x-label class="text-blue-600" for="stock" :value="__('Stock')" />
        <x-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock')" required autofocus />
    </div>
    <div class="my-4">
        <x-label class="text-blue-600" for="image" :value="__('Image')" />
        <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus />
    </div>
    <div class="my-4">
        <x-label class="text-blue-600" for="category_id" :value="__('Category')" />
        <select name="category_id" id="category_id" class="w-full block mt-1">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>

    <div class="text-center">
        <button type="submit" class="bg bg-blue-700 hover:bg-blue-600 text-white px-5 py-1 rounded my-2">Submit</button>
    </div>
</form>
