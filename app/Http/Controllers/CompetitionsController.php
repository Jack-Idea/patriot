<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetitionsController extends Controller
{
    public function index() {
        return view('competitions.index');
    }
}
