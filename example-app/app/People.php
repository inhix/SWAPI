<?php

namespace App;

class People
{

    public $name;
    public $height;
    public $mass;
    public $birthYear;
    public $gender;
    public $countFilms;
    public $homePlanetName;

    public function __construct($human)
    {
        $this->name = $human->name;
        $this->height = $human->height;
        $this->mass = $human->mass;
        $this->birthYear = $human->birth_year;
        $this->gender = $human->gender;
        $this->countFilms = count($human->films);
        $homePlanet = new SWAPIPlanetResponse($human->homeworld);
        $this->homePlanetName = $homePlanet->name;

    }

    public static function getAllPeople()
    {
        $responce = new SWAPIPeopleResponse('https://swapi.dev/api/people/');

        while ($responce->next !== null):
            foreach ($responce->results as $human)
                $allHumans [] = $human;
            $responce = new SWAPIPeopleResponse($responce->next);
        endwhile;

        if ($responce->next === null) {
            foreach ($responce->results as $human)
                $allHumans [] = $human;
        }

        return $allHumans;
    }

}
