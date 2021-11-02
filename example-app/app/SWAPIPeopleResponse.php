<?php

namespace App;

class SWAPIPeopleResponse extends SWAPIResponse
{

    public $count;
    public $next;
    public $previous;
    public array $results;

    public function __construct($url)
    {
        $resp = $this->getResponse($url);
        $this->count = $resp->count;
        $this->next = $resp->next;
        $this->previous = $resp->previous;
        foreach ($resp->results as $human) {
            $this->results [] = new People($human);
        }
    }

}

