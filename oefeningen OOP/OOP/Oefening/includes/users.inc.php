<?php

class Users{

    //Properties and Methods goes here
    public $first;
    public $last;
    public $hairColor;
    public $eyeColor;

    public function __construct($first, $last, 
    $haircolor, $eyecolor) {
        $this->first = $first;
        $this->last = $last;
        $this->hairColor= $haircolor;
        $this->eyeColor = $eyecolor;
    }

    public function fullName() {
        return $this->first."".$this->last;
    }

    public function __destruct() {

    }
}   
