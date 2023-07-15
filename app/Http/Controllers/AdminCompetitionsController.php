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
        $title = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $location = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $category = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $date_start = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $date_end = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $regulations = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $regulations_link = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $legal = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $legal_link = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $report = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
        $report_link = "Всероссийские соревнования по дзюдо «Детская Лига «Триумф Energy» (суперфинал)";
    }
}
