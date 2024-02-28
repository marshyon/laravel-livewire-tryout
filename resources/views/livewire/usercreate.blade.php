<div class="mt-10" >



    @if (session('success'))
        <span class="text-gray-600 bg-green-400 rounded w-100">{{ session('success') }}</span>
    @endif

<form wire:submit="createUser" class="w-full mx-auto w-96">

        <label class="block mt-3 text-sm font-medium leading-6 text-gray-300">Username  </label>
        <input class="block px-3 py-1 mb-1 text-gray-700 bg-gray-300 border border-gray-100 rounded" type="text"
            wire:model="name" placeholder="username">
        @error('name')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <label class="block mt-3 text-sm font-medium leading-6 text-gray-300">Email  </label>
        <input class="block px-3 py-1 mb-1 text-gray-700 bg-gray-300 border border-gray-100 rounded" type="text"
            wire:model="email" placeholder="email">
        @error('email')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <label class="block mt-3 text-sm font-medium leading-6 text-gray-300">Password  </label>
        <input class="block px-3 py-1 mb-1 text-gray-700 bg-gray-300 border border-gray-100 rounded" type="password"
            wire:model="password" placeholder="password">
        @error('password')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <label class="block mt-3 text-sm font-medium leading-6 text-gray-300">Profile Image</label>
        <input wire:model='image' accept="image/png image/jpeg image/jpg" type="file" id="image"
            class="block w-full px-3 py-1 text-sm text-gray-800 bg-gray-100 rounded ring-1 ring-inset ring-gray-300" />
        @error('image')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        @if($image)
            <img src="{{ $image->temporaryUrl() }}" alt="image" class="block w-20 h-20 my-5 rounded-full">
        @endif

        <button >

        <button type="submit" onclick="document.querySelector('input[type=file]').value = null" class="block px-3 py-1 text-white text-gray-200 bg-pink-800 rounded">Submit</button>


        @foreach ($users as $user)
            <p class="text-gray-200">user => {{ $user->name }}</p>
        @endforeach

    </form>
    {{ $users->links('vendor.pagination.tailwind') }}


</div>
