<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index() {
        return view('news.index');
    }

    public function getNews() {
        $news = News::orderBy('created_at', 'desc')->get();
        return compact('news');
    }

    public function viewOneNews(Request $request, $id) {
        return view('news.one-news');
    }

    public function getOneNews(Request $request) {
        $id = request('id');
        $news = News::find($id);
        return compact('news');
    }


}
