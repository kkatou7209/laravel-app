@use(App\Enums\Color)

@extends('layout')

@section('main')
<div class="w-full h-auto pt-14 pb-10 flex justify-center items-start">
    <div class="h-auto w-[70vh] py-10 px-14 border-solid border-[0.5px] border-gray-300 rounded-lg shadow-md shadow-gray-200 -translate-y-[1rem]">
        <form action="{{ route('todo.create') }}" method="POST">
            @csrf
            <h2 class="text-xl font-semibold tracking-wider">
                New ToDo
            </h2>
            <div class="mt-5 flex gap-6 flex-col">
                <input type="text" name="title" value="{{ @old('title') }}" placeholder="ToDo" autocomplete="off" class="p-3 text-lg border-b border-gray-400 focus:outline-none focus:border-blue-500">
                @error('title')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
                <input type="date" name="date" value="{{ @old('date') }}" placeholder="期限" autocomplete="off" class="p-3 text-xs rounded-md border border-gray-400 focus:outline-blue-500">
                <input type="time" name="time" value="{{ @old('time') }}" placeholder="期限" autocomplete="off" class="p-3 text-xs rounded-md border border-gray-400 focus:outline-blue-500">
                <select name="color" autocomplete="off" class="p-3 text-xs rounded-md border border-gray-400 focus:outline-blue-500">
                        <option value="">色を選択してください</option>
                        @foreach (Color::cases() as $color)
                            <option value="{{ $color }}" style="background-color: {{ $color }};" @selected(@old('color') === $color)>{{ $color->display() }}</option>
                        @endforeach
                </select>
                <textarea name="memo" placeholder="メモ" class="w-full min-h-20 resize-none field-sizing-content p-3 text-xs rounded-md border border-gray-400 focus:outline-blue-500">{{ @old('memo') }}</textarea>
            </div>
            <div class="mt-10 flex justify-end">
                <button type="submit" class="p-3 text-sm text-white bg-blue-500 rounded-sm shadow-md shadow-gray-300">
                    ToDoを追加
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
