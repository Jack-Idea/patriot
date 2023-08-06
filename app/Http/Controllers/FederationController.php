<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Doc;


class FederationController extends Controller
{
    public function index() {
        return view('federation.index');
    }
    // CONTACTS
    public function contacts() {
        return view('layouts.contacts');
    }
    // NEWS
    public function news() {
        return view('federation.news');
    }
    public function fedGetNews() {
        $news = News::where('federation', true)->orderBy('created_at', 'desc')->get();
        return compact('news');
    }
    // PHOTO
    public function photo() {
        return view('federation.photo');
    }
    // COMPETITIONS
    public function competitions() {
        return view('federation.competitions');
    }
    public function showCompetition() {
        return view('federation.show-competitions');
    }
    // DOCUMENTS
    public function docs() {
        return view('federation.docs');
    }
    public function getDocs() {
        $docs = Doc::orderBy('created_at', 'desc')->get();
        // $docs = [["title" => "some", "link" => "https://google.com"]];
        return compact('docs');
    }
}
