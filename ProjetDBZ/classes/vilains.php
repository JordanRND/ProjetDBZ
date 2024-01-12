<?php




class Vilain extends Character
{
    public $heartPoint;
    public $attackPoint;

    public function __construct($n)
    {
        parent::__construct($n);
        $this->heartPoint = rand(18, 28);
        $this->attackPoint = rand(4, 5);
    }

    public function getVilainHp()
    {
        return $this->heartPoint;
    }

    public function getVilainAp()
    {
        return $this->attackPoint;
    }

    public function setVilainHp($newHp)
    {
        $this->heartPoint = $newHp;
    }

    public function getAttacked($Hp, $Atk)
    {
        $newHp = $Hp - $Atk;
        return $newHp;
    }


    public function getVinfo()
    {

        $text = "[[--VILAIN : $this->name   --]] \nLevel : $this->level \nPV : $$this->heartPoint \nATQ : $$this->attackPoint \n";
        return $text;
    }

    public function VilainEsquive()
    {
        $esquive = rand(0, 2);
        return $esquive;
    }

    public function levelUp($l, $hp, $ap)
    {
        $this->level = $l + 1;
        $this->heartPoint = $hp + 10;
        $this->attackPoint = $ap + 5;
    }
}