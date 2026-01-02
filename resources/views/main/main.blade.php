@extends('layouts.main')

@section('content')

<div class="banner-container">
    <div class="banner-bg"></div>
    <h1 id="text-ko" class="moving-text ko">Welcome to GSK!</h1>
    <h1 id="text-en" class="moving-text en">안녕하세요 GSK 입니다</h1>
</div>

<section id="about" class="section">
    <h2 class="section-title">회사 소개</h2>
    <p>우리 회사는 고객 중심의 가치를 실현하며...</p>
</section>

<section id="notice" class="section">
    <h2 class="section-title">공지사항</h2>
    <table class="notice-table">
        <thead>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>날짜</th>
            <th>조회수</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $total - $loop->index }}</td>
            <td><a href="{{ route('posts.show', $post->idx) }}">{{ $post->title }}</a></td>
            <td>{{ $post->regdate }}</td>
            <td>150</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</section>

<section id="board" class="section">
    <h2 class="section-title">갤러리</h2>
    <div class="gallery-grid">
        <div class="gallery-item"><img src="{{ asset('images/gsk_main_banner2.jpg') }}" alt="Image 1"></div>
        <div class="gallery-item"><img src="{{ asset('images/gsk_main_banner2.jpg') }}" alt="Image 1"></div>
        <div class="gallery-item"><img src="{{ asset('images/gsk_main_banner2.jpg') }}" alt="Image 1"></div>
        <div class="gallery-item"><img src="{{ asset('images/gsk_main_banner2.jpg') }}" alt="Image 1"></div>
        <div class="gallery-item"><img src="{{ asset('images/gsk_main_banner2.jpg') }}" alt="Image 1"></div>
    </div>
</section>

<section id="location" class="section">
    <h2 class="section-title">오시는 길</h2>
    <div style="height: 400px; background-color: #e0e0e0; display: flex; align-items: center; justify-content: center; color: #555;">

    </div>
</section>

<section id="contact" class="section">
    <h2 class="section-title">상담 문의</h2>
    <form action="#" method="POST" class="contact-form">
        <div>
            <label for="form-title">제목</label>
            <input type="text" id="form-title" name="title" required placeholder="문의 제목을 입력해주세요">
        </div>
        <div>
            <label for="form-name">이름</label>
            <input type="text" id="form-name" name="name" required placeholder="성함을 입력해주세요">
        </div>
        <div>
            <label for="form-phone">연락처</label>
            <input type="text" id="form-phone" name="phone" required placeholder="연락 가능한 전화번호를 입력해주세요">
        </div>
        <div>
            <label for="form-content">내용</label>
            <textarea id="form-content" name="content" required placeholder="상담 내용을 자세히 입력해주세요"></textarea>
        </div>
        <button type="submit" class="submit-button">상담 신청 완료</button>
    </form>
</section>
@endsection