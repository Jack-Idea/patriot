<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Honor;

class AdminHonorController extends Controller
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

    public function storeHonor(Request $request) {
        $achievements = request('achievements');
        Honor::create([
            "full_name" => request("full_name"),
            "birthday" => request("birthday"),
            "place" => request("place"),
            "img" => request("img"),
            "achievements" => request("achievements")
        ]);

        $msg_status = 'Почетный добавлен';
        return compact('msg_status');
    }

    public function storeHonorImg(Request $request) {
        $file = $request->file;

        $path = time().'.'.'jpeg';
        $image = Image::make($file);
        $image->fit(650,650, function ($constraint) {
            $constraint->aspectRatio();
        })->save('img/uploads/honors/'.$path);
        $img = $path;
        
        return compact('img');
    }

    public function destroyHonor(Request $request) {
        $id = request('id');
        // $best = Honor::find($id);
        $msg_status = 'Почетный удален';
        $msg_status = $id;
        return ('msg_status');
    }
}
