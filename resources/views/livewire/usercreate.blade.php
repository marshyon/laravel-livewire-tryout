<div class="mt-10" >



    @if (session('success'))
        <span class="text-gray-600 bg-green-400 rounded w-100">{{ session('success') }}</span>
    @endif

<form wire:submit="createUser" class="w-full mx-auto w-96">

        <input class="block px-3 py-1 mb-1 text-gray-700 bg-gray-300 border border-gray-100 rounded" type="text"
            wire:model="name" placeholder="username">
        @error('name')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <input class="block px-3 py-1 mb-1 text-gray-700 bg-gray-300 border border-gray-100 rounded" type="text"
            wire:model="email" placeholder="email">
        @error('email')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <input class="block px-3 py-1 mb-1 text-gray-700 bg-gray-300 border border-gray-100 rounded" type="password"
            wire:model="password" placeholder="password">
        @error('password')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <button class="block px-3 py-1 text-white text-gray-200 bg-pink-800 rounded" type="submit">Submit</button>

        <p class="text-gray-200">users {{ count($users) }}</p>


        @foreach ($users as $user)
            <p class="text-gray-200">user => {{ $user->name }}</p>
        @endforeach

    </form>
    {{ $users->links('vendor.pagination.tailwind') }}


</div>
