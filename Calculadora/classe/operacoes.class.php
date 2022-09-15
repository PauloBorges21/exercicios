<?php

class Calculadora
{

    private  $total = 0;
    private  $add;
    private  $sub;
    private  $mult;
    private  $div;

    public function setAdd($n)
    {
        $this->total += $n;
    }

    public function getAdd()
    {
        return $this->add;
    }

    public function setSub($n)
    {
        $this->total -=$n;
    }

    public function getSub()
    {
        return $this->sub;
    }

    public function setMult($n)
    {
        $this->total *=$n;
    }

    public function getMult()
    {
        return $this->mult;
    }

    public function setDiv($n)
    {
        $this->total /=$n;
    }

    public function getDiv()
    {
        return $this->div;
    }

    public function setTotal($n)
    {
    $this->total = $n;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setClear(){
        $this->total = 0;
    }
    public function getClear(){
        return $this->total;
    }
}