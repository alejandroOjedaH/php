<?php namespace Libro;
      use DateTime;

class Libro{
    private int $id;
    private $nombre;
    private  $num_paginas;
    private $fecha_publicacion;
    private $leido;

    /**
     * Get the value of nombre
     *
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param string $nombre
     *
     * @return self
     */
    public function setNombre(string $nombre): self {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of num_paginas
     *
     * @return int
     */
    public function getNumPaginas() {
        return $this->num_paginas;
    }

    /**
     * Set the value of num_paginas
     *
     * @param int $num_paginas
     *
     * @return self
     */
    public function setNumPaginas(int $num_paginas): self {
        $this->num_paginas = $num_paginas;
        return $this;
    }

    /**
     * Get the value of fecha_publicacion
     *
     * @return DateTime
     */
    public function getFechaPublicacion() {
        return $this->fecha_publicacion;
    }

    /**
     * Set the value of fecha_publicacion
     *
     * @param DateTime $fecha_publicacion
     *
     * @return self
     */
    public function setFechaPublicacion(DateTime $fecha_publicacion): self {
        $this->fecha_publicacion = $fecha_publicacion;
        return $this;
    }

    /**
     * Get the value of leido
     *
     * @return bool
     */
    public function getLeido() {
        return $this->leido;
    }

    /**
     * Set the value of leido
     *
     * @param bool $leido
     *
     * @return self
     */
    public function setLeido(bool $leido): self {
        $this->leido = $leido;
        return $this;
    }
 public function __construct(string $nombre = null, int $num_paginas = null, DateTime $fecha_publicacion=null, bool $leido = null) {
    $this -> nombre = $nombre;
    $this -> num_paginas = $num_paginas;
    $this -> fecha_publicacion = $fecha_publicacion;
    $this -> leido = $leido;
 }
}
