<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Honor;

class LandingController extends Controller
{
    public function index() {
        return view('layouts.main');
    }

    public function toPatriot() {
        return view('layouts.patriot');
    }

    //GET GALLERY
    public function galleryPage() {
        return view('gallery.index');
    }

    //GET HONOR
    public function honorPage() {
        return view('honor.index');
    }

    //GET HONOR PEOPLE
    public function getHonor() {
        $bests = Honor::orderBy("place", "asc")->get();
        return compact('bests');
    }
}
