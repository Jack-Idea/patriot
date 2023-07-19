<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Medalist;

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

        $msg_status = 'Соревнования добавлены';

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

    //GET MEDALISTS
    public function getAdminMedalists() {
        $medalists = Medalist::orderBy('updated_at', 'desc')->get();
        return compact('medalists');
    }

    //ADD MEDALIST
    public function addMedalist(Request $request) {
        Medalist::create([
            'full_name' => request('full_name'),
            'birthday' => request('birthday'),
            'weight' => request('weight'),
        ]);
        $msg_status = 'Медалист добавлен';
        return compact('msg_status');
    }
    //EDIT MEDALIST
    public function editMedalist(Request $request) {
        $medalist_request = request('medalist');
        $total = [];
        if ($medalist_request["competitions"] !== null) {
            foreach ($medalist_request["competitions"] as $score) {
                array_push($total, $score["score"]);
            }
            $total = array_sum($total);
        } else {
            $total = 0;
        }
        $medalist = Medalist::find($medalist_request["id"]);
        $medalist->full_name =$medalist_request["full_name"];
        $medalist->birthday = $medalist_request["birthday"];
        $medalist->weight = $medalist_request["weight"];
        $medalist->competitions = $medalist_request["competitions"];
        $medalist->total_score = $total;
        $medalist->save();

        // $medalist = ["name" => "German", "competitions" => [["place" => "some", "score" => 2, "title" => "someTitle"],["place" => "some", "score" => 1, "title" => "someTitle"],["place" => "some", "score" => 5, "title" => "someTitle"]]];
        // $medalist = ["name" => "German", "competitions" => null];
        $msg_status = "Медалист отредактирован";
        return compact('msg_status');
    }
    //DELETE MEDALIST
    public function deleteMedalist(Request $request) {
        $id = request("id");
        $medalist = Medalist::find($id);
        $medalist->delete();
        $msg_status = "Медалист удален";
        return compact('msg_status');
    }
}
