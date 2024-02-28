<div>
    <div id="content" class="mx-auto" style="max-width:500px;">

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
