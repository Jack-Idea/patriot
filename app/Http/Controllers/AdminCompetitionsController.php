<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;

class AdminCompetitionsController extends Controller
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

    public function storeCompetition(Request $request) {
        // $title = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        // $location = "Россия, Сочи";
        // $category = "юноши и девушки до 15 лет (2009-2010 г.р.)";
        // $date_start = "2023-07-05";
        // $date_end = "2023-07-06";
        // $regulations_link = "https://sport-nvrsk.ru";
        // $legal_link = "https://google.com";
        // $report_link = "https://jack-test.ru";


        $title = request('title');
        $location = request('location');
        $category = request('category');
        $date_start = request('start');
        $date_end = request('end');
        $regulations_link = request('regulations');
        $legal_link = request('legal');

        if ($date_end === $date_start) {
            $date_end = null;
        }

        Competition::create([
            'title' => $title,
            'location' => $location,
            'category' => $category,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'regulations_link' => $regulations_link,
            'legal_link' => $legal_link
        ]);

        $msg_status = 'Соревнования добавлены!';

        return compact('msg_status');
    }

    //EDIT COMPETITION
    public function editCompetition(Request $request) {
        $request_competition = request('competition');
        $request_competition = json_encode($request_competition);

        // foreach ($request_competition as $comp) {
        //     $id = $comp->id;
        // }
        $msg_status = 'Соревнование изменено';
        return compact('request_competition', 'msg_status');
    }
    
    //DESTROY COMPETITION
    public function destroyCompetition(Request $request) {
        $id = request('id');
        $competition = Competition::find($id);

        $competition->delete();
        $msg_status = 'Соревнование удалено';
        return compact('msg_status', 'competition');
    }
}
