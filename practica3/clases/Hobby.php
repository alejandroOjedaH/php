<?php namespace Hobby;
abstract class Hobby{
    abstract public function setNombre($nombre);
    abstract public function getNombre():string;
}