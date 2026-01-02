@extends('layouts.main')

@section('content')

    <table class="w-[50%] relative border-collapse my-0 mx-auto mt-[100px]" border="1" cellpadding="5">
        <a class="write-btn absolute right-[10px] " href="{{ route('posts.create') }}">글쓰기</a>
        <thead>
        <tr class="bg-blue-900 border-b border-gray-200 text-white">
            <th class="px-6 py-4 font-semibold uppercase text-sm">번호</th>
            <th class="px-6 py-4 font-semibold uppercase text-sm w-1/2">제목</th>
            <th class="px-6 py-4 font-semibold uppercase text-sm">등록일</th>
            <th class="px-6 py-4 font-semibold uppercase text-sm">관리</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($posts as $post)
            <tr class="hover:bg-blue-300 transition duration-150 cursor-pointer">
                <td class="px-6 py-4 text-gray-600 text-center">{{ $post->idx }}</td>
                <td class="px-6 py-4 text-gray-600"><a href="{{ route('posts.show', $post->idx) }}">{{ $post->title }}</a></td>
                <td class="px-6 py-4 text-gray-600">{{ $post->regdate }}</td>
                <td class="px-6 py-4 text-gray-600 text-center">
                    @if($post->file1)
                        <img src="{{ asset('storage/' . $post->file1) }}" class="max-h-[30px]">
                    @endif
                    <button onclick="location.href='{{ route('posts.edit', $post->idx) }}'" type="button" class="w-12 h-6 bg-blue-200 rounded">수정</button>
                    <form action="{{ route('posts.destroy', $post->idx) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="w-12 h-6 bg-blue-200 rounded" type="submit" onclick="return confirm('삭제하시겠습니까?')">삭제</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="margin-top:20px;">
        {{ $posts->links() }}
    </div>
@endsection