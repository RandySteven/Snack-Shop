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
        <x-input id="stock" class="block mt-1 w-full" type="text" name="stock" :value="old('stock')" required autofocus />
    </div>
    <div class="my-4">
        <x-label class="text-blue-600" for="image" :value="__('Image')" />
        <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus />
    </div>
</form>
