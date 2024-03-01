<div class="mt-10">
    <div id="content" class="mx-auto" style="max-width:500px;">
        @if (session('success'))
            <span class="text-gray-600 bg-green-400 rounded w-100">{{ session('success') }}</span>
        @endif

        <form wire:submit="createUser" class="w-full mx-auto w-96">
            <label class="block mt-3 text-sm font-medium leading-6 text-gray-500">Username </label>
            <input class="block px-3 py-1 mb-1 text-gray-700 bg-gray-300 border border-gray-100 rounded" type="text"
                wire:model="name" placeholder="username">
            @error('name')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

            <label class="block mt-3 text-sm font-medium leading-6 text-gray-500">Email </label>
            <input class="block px-3 py-1 mb-1 text-gray-700 bg-gray-300 border border-gray-100 rounded" type="text"
                wire:model="email" placeholder="email">
            @error('email')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

            <label class="block mt-3 text-sm font-medium leading-6 text-gray-500">Password </label>
            <input class="block px-3 py-1 mb-1 text-gray-700 bg-gray-300 border border-gray-100 rounded" type="password"
                wire:model="password" placeholder="password">
            @error('password')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

            <label class="block mt-3 text-sm font-medium leading-6 text-gray-500">Profile Image</label>
            <input wire:model='image' accept="image/png image/jpeg image/jpg" type="file" id="image"
                class="block w-full px-3 py-1 text-sm text-gray-800 bg-gray-100 rounded ring-1 ring-inset ring-gray-300" />
            @error('image')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror


            <div class="flex items-center h-6">
                <div wire:loading wire:target="image">
                    <span class="text-gray-500">
                        Uploading...</span>
                </div>
            </div>



            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="image" class="block w-20 h-20 my-5 rounded-full">
            @endif





            <div class="flex items-center h-6">
                <span wire:loading.delay wire:loading.remove class="text-gray-500">Sending...</span>
            </div>

            <button wire:loading.class='bg-green-500' wire:loading.attr='disabled' type="submit"
                onclick="document.querySelector('input[type=file]').value = null"
                class="block px-3 py-1 text-white bg-pink-500 rounded hover:bg-pink-700 disabled:opacity-50 disabled:cursor-not-allowed">Submit</button>
        </form>



    </div>
</div>
