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

    public function destroyNews(Request $request) {
        $id = request('id');
        $news = News::find($id);
        // $news = News::find(1);
        $one_img = $news->img;
        if ($one_img != null) {
            unlink('img/uploads/news/'.$one_img);
        }
        if ($news->imgs != null) {
            foreach ($news->imgs as $img) {
                unlink('img/uploads/news/'.$img["img"]);
            }
        }
        $news->delete();
        $msg_status = 'Новость успешна удалена';
        return compact('msg_status', 'news');
    }
}
