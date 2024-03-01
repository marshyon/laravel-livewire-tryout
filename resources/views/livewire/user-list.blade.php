<div class="mt-10">
    <div id="content" class="mx-auto" style="max-width:500px;">



        <div>
            @foreach ($users as $user)
                <p class="text-gray-500">user => {{ $user->name }}</p>
            @endforeach


            {{ $users->links('vendor.pagination.tailwind') }}
        </div>


    </div>
</div>
