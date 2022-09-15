<?php
require_once ("interface.class.php");
class Quadrado implements Forma
{
    private $largura;
    private $altura;

    public function __construct($larg, $alt)
    {
        $this->largura = $larg;
        $this->altura = $alt;
    }

    public function getTipo()
    {
        return 'quadrado';
        // TODO: Implement getTipo() method.
    }

    public function getArea()
    {
        return $this->largura * $this->altura;
        // TODO: Implement getArea() method.
    }
}


class Circulo implements Forma
{
    private $raio;

    public function __construct($r)
    {
        $this->raio = $r;
    }

    public function getTipo()
    {
        return "Circulo";
        // TODO: Implement getTipo() method.
    }

    public function getArea()
    {
        return pi() * ($this->raio * $this->raio);
    }
}

