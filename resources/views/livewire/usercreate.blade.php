<div>
<form wire:submit="createUser">
    <input class="block rounded border bg-gray-300 text-gray-700 border-gray-100 px-3 py-1 mb-1" type="text" wire:model="name" placeholder="username">
    @error('name')
        <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror

    <input class="block rounded border bg-gray-300 text-gray-700 border-gray-100 px-3 py-1 mb-3" type="text" wire:model="email" placeholder="email">
    @error('email')
        <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror

    <input class="block rounded border bg-gray-300 text-gray-700 border-gray-100 px-3 py-1 mb-3" type="password" wire:model="password" placeholder="password">
    @error('password')
        <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror

    <button class="block rounded px-3 py-1 text-gray-200 bg-pink-800 text-white"  type="submit">Submit</button>

    @foreach($users as $user)
        <p class="text-gray-200">user => {{ $user->name }}</p>
    @endforeach
</div>
