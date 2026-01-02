@extends('layouts.main')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 mt-[100px]">

        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('posts.update', $post->idx) }}">
            @csrf
            @method('PUT')

            <!-- 제목 -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4"><input type="text" name="title" value="{{ $post->title }}"></h1>


            <!-- 내용 -->
            <div class="prose prose-lg text-gray-700">
                <textarea name="content" class="w-full">{{ $post->content }}</textarea>
            </div>

            <!-- 수정/삭제 버튼 (선택) -->
            <div class="mt-6 flex space-x-3">

                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                        수정
                    </button>

            </div>

            </form>
        </div>

        <a href="{{ route('posts.index') }}" class="inline-block mb-6 text-blue-600 hover:underline">
            목록으로
        </a>

    </div>
@endsection