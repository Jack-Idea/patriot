<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function index() {
        return view('layouts.main');
    }

    public function toPatriot() {
        return view('layouts.patriot');
    }

    public function sendQuiz(Request $request) {
        $firstname = request('firstname');
        $lastname = request('lastname');
        $plus_one = request('plus_one');
        $invite = request('invite');
        $alcohol = request('alcohol');

        $selected_alcohol = [];
        foreach($alcohol as $alc) {
            if($alc['choice'] === true) {
                array_push($selected_alcohol, $alc);
            }
        }
        Mail::send('layouts.mail', ['firstname' => $firstname, 'lastname' => $lastname, 'plus_one' => $plus_one, 'invite' => $invite, 'alcohol' => $selected_alcohol],
            function ($message) use ($firstname, $lastname, $plus_one, $invite, $selected_alcohol) {
                $message->to('makarenkogerman@gmail.com', 'WEDDING')->subject('Ответ на приглашение!');
                // $message->to('admin@td-akn.ru', 'WEDDING')->subject('Ответ на приглашение!');
                // $message->from('zerrenderwork@yandex.ru', 'AKN');
            });
        
        $result = 'Спасибо за ответ!';
        return compact('result', 'firstname');
    }

    //GET GALLERY
    public function galleryPage() {
        return view('gallery.index');
    }
}
