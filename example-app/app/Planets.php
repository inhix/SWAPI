<?php
namespace App;

class Planets {

    public $name;

    public function __construct($planet)
    {
        $this->name = $planet->name;
    }


}
