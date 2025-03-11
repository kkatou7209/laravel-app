@use(Illuminate\Support\Carbon)

@push('scripts')
    @vite(['resources/ts/todo/toggle.ts'])
@endpush

@extends('layout')

@section('main')
<div class="w-full h-auto pt-14 pb-10 flex flex-col justify-start items-center gap-6">

    @foreach ($todos as $todo)

        <div class="h-auto w-[70vh] py-5 pl-13 pr-6 border-solid border-[0.5px] border-gray-300 rounded-lg shadow-md shadow-gray-200 relative overflow-hidden">
            <div class="w-[7%] h-full absolute top-0 left-0" style="background-color: {{ $todo->color }}"></div>
            <form action="{{ route('todo.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex items-center gap-7">
                    <div class="mt-2">
                        <input type="checkbox" @checked($todo->done) class="todo-done w-[25px] h-[25px]" todo-id="{{ $todo->id }}">
                    </div>
                    <div class="w-full flex flex-col gap-3">
                        <x-link href="{{ route('todo.edit', ['id' => $todo->id]) }}" class="text-md font-semibold tracking-wider">
                            {{ $todo->title }}
                        </x-link>
                        @if ($todo->memo !== null)
                            <span class="text-xs">
                                {{ $todo->memo }}
                            </span>
                        @endif
                        <div class="flex gap-2">
                            <x-google-icon name="schedule" class="text-[20px]! text-gray-400"/>
                            <span class="text-xs text-gray-400">
                                {{ Carbon::create($todo->deadline)->isoFormat('YYYY/MM/DD（ddd）HH:mm') }}
                            </span>
                        </div>
                    </div>
                    <div class="w-[10%] flex justify-end items-center">
                        <input type="number" name="id" value="{{ $todo->id }}" class="h-0 invisible">
                        <button type="submit" class="p-3 text-sm text-white bg-blue-500 rounded-sm shadow-md shadow-gray-300">
                            <x-google-icon name="delete"/>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    @endforeach

</div>
@endsection
