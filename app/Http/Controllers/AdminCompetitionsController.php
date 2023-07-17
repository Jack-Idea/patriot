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
        $date_end = $request_competition['date_end'];

        $competition = Competition::find($request_competition['id']);
        $competition->title = $request_competition['title'];
        $competition->location = $request_competition['location'];
        $competition->category = $request_competition['category'];
        $competition->date_start = $request_competition['date_start'];
        if ($request_competition['date_start'] === $date_end) {
            $date_end = null;
        }
        $competition->date_end = $date_end;
        $competition->regulations_link = $request_competition['regulations_link'];
        $competition->legal_link = $request_competition['legal_link'];
        $competition->report_link = $request_competition['report_link'];

        $competition->save();
        $msg_status = 'Соревнование изменено';
        return compact('competition', 'msg_status');
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
