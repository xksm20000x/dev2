<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class MainController extends Controller
{
    public function main()
    {
        $total = DB::table('posts')->count();

        $posts = DB::table('posts')
            ->orderBy('regdate', 'desc')
            ->limit(5)->get();

        return view('main.main', compact('posts','total'));
    }
}