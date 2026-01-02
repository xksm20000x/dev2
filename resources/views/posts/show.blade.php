@extends('layouts.main')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 mt-[100px]">
        <!-- 뒤로가기 버튼 -->
        <a href="{{ route('posts.index') }}" class="inline-block mb-6 text-blue-600 hover:underline">
            ← 목록으로 돌아가기
        </a>

        <div class="bg-white shadow rounded-lg p-6">
            <!-- 제목 -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

            <!-- 작성자 및 작성일 -->
            <div class="flex items-center text-sm text-gray-500 mb-6">
                <span>작성자: </span>
                <span class="mx-2">|</span>
                <span>{{ $post->regdate }}</span>
            </div>

            <!-- 내용 -->
            <div class="prose prose-lg text-gray-700">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- 수정/삭제 버튼 (선택) -->
            <div class="mt-6 flex space-x-3">
                <a href="{{ route('posts.edit', $post->idx) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                    수정
                </a>
                <form action="{{ route('posts.destroy', $post->idx) }}" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                        삭제
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection