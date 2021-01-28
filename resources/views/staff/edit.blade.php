<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-center text-5xl">Edit Staff</h3>
                    <form action="" method="POST">
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{ $user->name }}" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" value="{{ $user->email }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" value="{{ $user->phone }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="salary" :value="__('Salary')" />

                            <x-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary')" value="{{ $user->salary }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="photo" :value="__('Photo')" />

                            <x-input id="photo" class="block mt-1 w-full" type="file" name="photo" :value="old('photo')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="address" :value="__('Address')" />

                            <textarea name="address" id="address" :value="old('address')" class="block mt-1 w-full" rows="5">
                                {{ $user->address }}
                            </textarea>
                        </div>

                        <div class="mt-4">
                            <x-label for="role_id" :value="__('Role')" />
                            <select name="role_id" class="block mt-1 w-full" id="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4 text-center">
                            <button type="submit" class="px-4 py-1 bg-yellow-700 hover:bg-yellow-600 text-white rounded">Edit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
