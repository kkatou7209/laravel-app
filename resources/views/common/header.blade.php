<header class="sticky top-0 left-0 bg-inherit">
    <div class="w-screen h-[10vh] pl-5 pr-5 flex justify-between items-center">
        <div>
            <a href="{{ route('home') }}">
                <h1 class="text-3xl font-bold">{{ env('APP_NAME') }}</h1>
            </a>
        </div>

        <div class="flex gap-2">
            <x-link href="{{ route('todo.create') }}">
                <x-google-icon name="add" class="text-2xl"/>
            </x-link>
            <x-link href="{{ route('todo.index') }}">
                <x-google-icon name="list" class="text-2xl"/>
            </x-link>
        </div>
    </div>
</header>
