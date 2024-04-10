<?php

class Pasajero
{

    private $nombre;
    private $apellido;
    private $numDoc;
    private $telefono;

    //Metodo constructor
    public function __construct($nombre, $apellido, $numDoc, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDoc = $numDoc;
        $this->telefono = $telefono;
    }

    
    /* Metodos GET */

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getNumDoc()
    {
        return $this->numDoc;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

/* SET */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }


    public function setNumDoc($numDoc)
    {
        $this->numDoc = $numDoc;
    }
    
     
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }


    public function __toString() {

        return "Nombre: " . $this->getNombre() . "\n" .
               "Apellido: " . $this->getApellido() . "\n" .
               "Documento Nº: " . $this->getNumDoc();
               "N° de teléfono: " . $this->getTelefono() . "\n" ;
    }
}
