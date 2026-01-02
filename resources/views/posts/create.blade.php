<h1>글쓰기</h1>

<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="제목"><br>
    <textarea name="content" placeholder="내용"></textarea><br>
    <input type="file" name="file">
    <button type="submit">저장</button>
</form>
