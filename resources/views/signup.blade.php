@extends('layout')

@section('main')
<div class="w-full h-full flex justify-center items-center">
    <div class="h-auto w-[70vh] py-10 px-14 border-solid border-[0.5px] border-gray-300 rounded-lg shadow-md shadow-gray-200 -translate-y-[1rem]">
        <form>
            <h2 class="text-xl font-semibold tracking-wider">
                Sign Up
            </h2>
            <div class="w-full h-[1px] mt-2 bg-gray-300"></div>
            <div class="mt-9 flex gap-6 flex-col">
                <input type="text" placeholder="ユーザー名" autocomplete="off" class="p-3 text-xs rounded-md border border-gray-400 focus:outline-blue-500">
                <input type="email" placeholder="メールアドレス" autocomplete="off" class="p-3 text-xs rounded-md border border-gray-400 focus:outline-blue-500">
                <input type="password" placeholder="パスワード" autocomplete="off" class="p-3 text-xs rounded-md border border-gray-400 focus:outline-blue-500">
                <input type="password" placeholder="パスワード（確認用）" autocomplete="off" class="p-3 text-xs rounded-md border border-gray-400 focus:outline-blue-500">
            </div>
            <div class="mt-10 flex justify-end">
                <button class="p-3 text-sm text-white bg-blue-500 rounded-sm shadow-md shadow-gray-300">
                    登録
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
