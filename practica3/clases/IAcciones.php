<?php namespace IAcciones;
interface IAcciones{
    public function iniciar();
    public function detener();
    public function actualizar(array $a);
}