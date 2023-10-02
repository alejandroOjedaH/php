<?php namespace Magic;
      use Hobby\Hobby;

class Magic extends Hobby{
    private $nombre;
    private $descipcion_truco;
    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }
    public function getNombre(): string{
        return $this -> nombre;
    }
    public function __construct($nombre, $descripcion) {
        $this ->setNombre($nombre);
        $this ->setDescipcionTruco($descripcion);
    }

    public function getDescipcionTruco() {
        return $this->descipcion_truco;
    }

    public function setDescipcionTruco($descipcion_truco): self {
        $this->descipcion_truco = $descipcion_truco;
        return $this;
    }
}