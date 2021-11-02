<?php

namespace App\Http\Controllers;

use App\People;
use App\SWAPIPeopleResponse;
use App\SWAPIPlanetResponse;
use Psr\Log\NullLogger;


class HomeController extends Controller
{
    public function index()
    {

        $responce = new SWAPIPeopleResponse('https://swapi.dev/api/people/');

        while ($responce->next !== null):
            foreach ($responce->results as $human)
                $allHumans [] = $human;
            $responce = new SWAPIPeopleResponse($responce->next);
        endwhile;

        if($responce->next === null) {
            foreach ($responce->results as $human)
                $allHumans [] = $human;
        }



        return view('welcome', ['allHumans' => $allHumans, 'num' => 0]);
    }

}
