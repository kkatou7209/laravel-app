<header class="fixed top-0 left-0 bg-inherit z-999">
    <div class="w-screen h-header pl-5 pr-5 flex justify-between items-center bg-test">
        <div>
            <a href="{{ route('home') }}">
                <h1 class="text-3xl font-bold tracking-widest">{{ env('APP_NAME') }}</h1>
            </a>
        </div>

        <div class="flex gap-2">
            <x-link href="{{ route('todo.new') }}">
                <x-google-icon name="add" class="text-2xl"/>
            </x-link>
            <x-link href="{{ route('todo.index') }}">
                <x-google-icon name="list" class="text-2xl"/>
            </x-link>
        </div>
    </div>
</header>
