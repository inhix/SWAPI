<?php

namespace App;

class SWAPIPlanetResponse extends SWAPIResponse
{

    public $name;

    public function __construct($url)
    {
        $resp = $this->getResponse($url);
        $this->name = $resp->name;
    }

}

