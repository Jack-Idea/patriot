<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use Illuminate\Support\Carbon;

class CompetitionsController extends Controller
{
    public function index() {
        return view('competitions.index');
    }

    //GET YEAR COMPETITIONS
    public function getYearCompetitions(Request $request) {
        $year = request('year');
        // Находим дату и парсим
        if (!$year) {
            $year = Carbon::now('+03:00');
            $year = Carbon::parse($year)->format('Y');
        }
        
        $competitions = Competition::orderBy('date_start', 'asc')->whereBetween('date_start', [$year.'-01-01', $year.'-12-31'])->get();
        return compact('competitions');
    }

    //SHOW COMPETITION
    public function showCompetition() {
        return view('competitions.show');
    }

    //GET ONE
    public function getOneCompetition(Request $request) {
        $competition = Competition::find(request('id'));
        return compact('competition');
    }
}
