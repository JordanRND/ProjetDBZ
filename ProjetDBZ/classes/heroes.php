<?php



class Hero extends Character
{
    public $heartPoint;
    public $attackPoint;

    public function __construct($n)
    {
        parent::__construct($n);
        $this->heartPoint = rand(15, 25);
        $this->attackPoint = rand(4, 5);
    }

    public function getHeroHp()
    {
        return $this->heartPoint;
    }

    public function getHeroAp()
    {
        return $this->attackPoint;
    }

    public function setHeroHp($newHp)
    {
        $this->heartPoint = $newHp;
    }


    //Statistique qui permet de récupérer l'information sur les points de vie et les attaques

    public function getHinfo()
    {

        $text = "[[--HERO : $this->name   --]] \nLevel : $this->level \nPV : $$this->heartPoint \nATQ : $$this->attackPoint \n";
        return $text;
    }

    // Fonction pour prendre des degats
    public function getAttacked($Hp, $Atk)
    {
        $newHp = $Hp - $Atk;
        return $newHp;
    }
    public function levelUp($l, $hp, $ap)
    {
        $this->level = $l + 1;
        $this->heartPoint = $hp + 10;
        $this->attackPoint = $ap + 5;
    }
}

