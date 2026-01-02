<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        $total = DB::table('posts')->count();
        $posts = DB::table('posts')
            ->orderBy('regdate', 'desc')
            ->offset($offset)
            ->limit($perPage)
            ->paginate(10);
            //->get();

        $boardname = DB::table('board_config')
            ->where('idx',1)
            ->value('bo_name');

        $fileCnt = $posts->filter(fn($post) => $post->file1)->count();

        return view('posts.index', compact('posts','boardname','fileCnt'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public'); // storage/app/public/uploads

        }

        DB::table('posts')->insert([
            'title' => $request->title,
            'content' => $request->content,
            'regdate' => now(),
            'file1' => $path
        ]);

        return redirect()->route('posts.index');
    }

    public function show($idx)
    {
        $post = DB::table('posts')->where('idx', $idx)->first();
        return view('posts.show', compact('post'));
    }

    public function edit($idx)
    {
        $post = DB::table('posts')->where('idx', $idx)->first();
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $idx)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        DB::table('posts')
            ->where('idx', $idx)
            ->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);

        return redirect()->route('posts.index');
    }

    public function destroy($idx)
    {
        DB::table('posts')->where('idx', $idx)->delete();
        return redirect()->route('posts.index');
    }
}


/*

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('regdate','desc')->paginate(10);
        return view('posts.index', compact('posts'));
        //return view('posts.index', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
*/