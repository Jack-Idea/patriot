<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\News;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.index');
    }

    //DELETE HOME BEFORE PRODUCTION
    public function welcome() {
        return view('home');
    }

    // SAVE NEWS
    public function storeNews(Request $request) {
        News::create([
            'title' => request('title'),
            'description' => request('description'),
            'img' => request('img'),
            'imgs' => request('imgs'),
        ]);
        $msg_status = 'Новость успешно сохранена';
        return compact('msg_status');
    }

    // UPDATE 1 IMG
    public function updateImg(Request $request) {

        $file = $request->file;
        $size = getimagesize($file);
        $ratio = $size[0] / $size[1];
        $ratio = number_format($ratio, 1);

        if ($ratio > 1.5) {
            $path = time().'.'.'jpeg';
            $image = Image::make($file);
            $image->fit(900,600, function ($constraint) {
                $constraint->aspectRatio();
            })->save('img/uploads/news/'.$path);
            $img = $path;
        } else {
            $path = time().'.'.'jpeg';
            $image = Image::make($file);
            $image->fit(650,650, function ($constraint) {
                $constraint->aspectRatio();
            })->save('img/uploads/news/'.$path);
            $img = $path;
        }

        return compact('img');
    }

    // UPDATE IMGS
    public function updateImgs(Request $request) {

        $file = $request->file;
        $imgs = [];

        if (is_array($file)) {
            $i = 0;
            foreach ($file as $f) {
                
                $size = getimagesize($f);
                $ratio = $size[0] / $size[1];
                $ratio = number_format($ratio, 1);

                if ($ratio > 1.5) {
                    $path = time().$i.'.'.'jpeg';
                    $image = Image::make($f);
                    $image->fit(900,600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save('img/uploads/news/'.$path);
                    $i = $i+1;
                    array_push($imgs, ["img" => $path, "ratio" => $ratio]);
                } else {
                    $path = time().$i.'.'.'jpeg';
                    $image = Image::make($f);
                    $image->fit(650,650, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save('img/uploads/news/'.$path);
                    $i = $i+1;
                    array_push($imgs, ["img" => $path, "ratio" => $ratio]);
                }
            }
        } else {
            $size = getimagesize($file);
            $ratio = $size[0] / $size[1];
            $ratio = number_format($ratio, 1);

            if ($ratio > 1.5) {
                $path = time().'.'.'jpeg';
                $image = Image::make($file);
                $image->fit(900,600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('img/uploads/news/'.$path);
                $imgs = ["img" => $path, "ratio" => $ratio];
            } else {
                $path = time().'.'.'jpeg';
                $image = Image::make($file);
                $image->fit(650,650, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('img/uploads/news/'.$path);
                $imgs = ["img" => $path, "ratio" => $ratio];
            }
        }

        return compact('imgs');
    }
    
    //DESTROY NEWS
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
