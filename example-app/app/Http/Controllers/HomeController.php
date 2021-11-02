<?php

namespace App\Http\Controllers;

use App\People;

class HomeController extends Controller
{
    public function index()
    {
        $allHumans = People::getAllPeople();

        return view('table', ['allHumans' => $allHumans, 'num' => 0]);
    }

}
