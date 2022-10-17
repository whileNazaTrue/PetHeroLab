<?php 
namespace Models;
class Duenio extends Usuario {
    private $mascotas;


    
    public function __construct($email,$fullname,$dni,$age,$password){
        parent::__construct($email,$fullname,$dni,$age,$password);
        $this->mascotas = array();
    }

    public function getMascotas(){
        return $this->mascotas;
    }

    public function setMascotas($mascotas){
        $this->mascotas = $mascotas;
    }

    public function addMascota($mascota){
        array_push($this->mascotas, $mascota);
    }

    public function removeMascota($mascota){
        $index = array_search($mascota, $this->mascotas);
        if($index !== false){
            unset($this->mascotas[$index]);
        }
    }

    

}




?>