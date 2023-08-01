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

    public function editHonor(Request $request) {
        $request_best = request('best');
        $best = Honor::find($request_best['id']);
        $best->full_name = $request_best['full_name'];
        $best->birthday = $request_best['birthday'];
        $best->place = $request_best['place'];
        $best->achievements = $request_best['achievements'];
        $best->save();
        
        $msg_status = 'Почетный отредактирован';
        return compact('msg_status');
    }

    public function destroyHonor(Request $request) {
        $id = request('id');
        $best = Honor::find($id);

        if ($best->img != null) {
            unlink('img/uploads/honors/'.$best->img);
        }
        $best->delete();

        $msg_status = 'Почетный удален';
        return compact('msg_status');
    }
}
