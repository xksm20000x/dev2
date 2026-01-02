<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSK</title>
    <!--<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

        

        .pagination {
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            margin: 0 2px;
            padding: 5px 10px;
            border: 1px solid #ddd;
            color: #007bff;
        }

        .pagination .active span {
            font-weight: bold;
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

    </style>

</head>
<body class="w-[1000px] mx-[auto] my-0 text-sm relative">

<!-- 페이지 제목 -->
<header>
    <h1><a href="{{ route('posts.index') }}">GSK Board  - {{ $boardname }}</a></h1>
    <hr>
</header>

<!-- 본문 -->
<main>
    @yield('content')
</main>

</body>
</html>
