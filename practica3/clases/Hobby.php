<?php namespace Hobby;
abstract class Hobby{
    private $tiempoMaximo;
    private $tiempoMinimo;
    abstract public function setNombre($nombre);
    abstract public function getNombre():string;

    public function getTiempoMaximo(){
        return $this->tiempoMaximo;
    }


    public function setTiempoMaximo($tiempoMaximo): self {
        $this->tiempoMaximo = $tiempoMaximo;
        return $this;
    }

    public function getTiempoMinimo(){
        return $this->tiempoMinimo;
    }

    public function setTiempoMinimo($tiempoMinimo): self {
        $this->tiempoMinimo = $tiempoMinimo;
        return $this;
    }
}