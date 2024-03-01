<div>
    <div id="content" class="mx-auto" style="max-width:500px;">

        @if (session('error'))
            <div class="p-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500" role="alert">
                <p class="font-bold">Warning !</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @include('livewire.includes.create-todo-box')


        @include('livewire.includes.search-box')


        <div id="todos-list">

            @foreach ($todos as $todo)
                @include('livewire.includes.todo-item')
            @endforeach

            <div class="my-2">

                {{ $todos->links() }}

            </div>
        </div>
    </div>
</div>
