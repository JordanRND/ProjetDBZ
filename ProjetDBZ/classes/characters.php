<?php


require "heroes.php";
require "vilains.php";
require "fight.php";

class Character
{
    public $name;
    public $level;
    public $kamehameha;
    public $attackPointKamehameha;

    public function __construct($n)
    {
        $this->name = $n;
        $this->level = 1;
        $this->kamehameha = false;
        $this->attackPointKamehameha = 10;
    }

    //Name
    public function getName()
    {
        return $this->name;
    }

    //Level
    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($newLevel)
    {
        $this->level = $newLevel;
    }

    public function getApKamehameha()
    {
        return $this->attackPointKamehameha;
    }

    public function checkKamehameha()
    {
        return $this->kamehameha;
    }

    public function activateKamehameha($firstWinCheck)
    {
        if ($firstWinCheck == 1) {
            $this->kamehameha == true;
        }
    }
}


