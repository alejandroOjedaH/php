<?php namespace GestorMascotas;

use Exception;
use PDO;


class GestorMascotas{
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }
    function table(){
        $result= null;
        try{
            $sql = "select m.nombre as nombremascota,tipo, fecha_nacimiento,foto_url,p.nombre as nombrepersona, apellido  from mascotas m left join personas p on p.id = m.id_persona";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function mascAsc(){
        $result= null;
        try{
            $sql = "select m.nombre as nombremascota,tipo, fecha_nacimiento,foto_url,p.nombre as nombrepersona, apellido  from mascotas m left join personas p on p.id = m.id_persona order by m.nombre";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function mascDes(){
        $result= null;
        try{
            $sql = "select m.nombre as nombremascota,tipo, fecha_nacimiento,foto_url,p.nombre as nombrepersona, apellido  from mascotas m left join personas p on p.id = m.id_persona order by m.nombre desc";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function tipoAsc(){
        $result= null;
        try{
            $sql = "select m.nombre as nombremascota,tipo, fecha_nacimiento,foto_url,p.nombre as nombrepersona, apellido  from mascotas m left join personas p on p.id = m.id_persona order by tipo";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function tipoDes(){
        $result= null;
        try{
            $sql = "select m.nombre as nombremascota,tipo, fecha_nacimiento,foto_url,p.nombre as nombrepersona, apellido  from mascotas m left join personas p on p.id = m.id_persona order by tipo desc";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
}

