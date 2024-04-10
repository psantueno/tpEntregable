/* CONSIGNA:

La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa
almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje. (OK)
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los
datos de los pasajeros). (OK)
Utilice clases y arreglos para almacenar la información correspondiente a los pasajeros. Cada pasajero guarda su “nombre”, “apellido” y
“numero de documento”. (OK)

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje,
modificar y ver sus datos. Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido,
numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. (OK)

También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de
empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje. (OK)

Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que
agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas
de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

<?php

class Viaje
{
    public $codigo;
    public $destino;
    public $max_pasajeros;
    public $pasajeros = array();
    public $responsableV;


    public function __construct($codigo, $destino, $max_pasajeros, $responsableV)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->max_pasajeros = $max_pasajeros;
        $this->responsableV = $responsableV;
    }


    /* GET */
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function getMaxPasajeros()
    {
        return $this->max_pasajeros;
    }

    public function getPasajeros()
    {
        return $this->pasajeros;
    }

    public function getResponsable()
    {
        return $this->responsableV;
    }


    /* SET */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function setMaxPasajeros($max_pasajeros)
    {
        $this->max_pasajeros = $max_pasajeros;
    }

    public function setPasajeros($passengers)
    {
        $this->pasajeros = $passengers;
    }

    public function setResponsable($nuevoResponsable)
    {
        $this->responsableV = $nuevoResponsable;
    }


// Agregar pasajeros.
    public function agregarPasajero($newPasajero)
    {
        $chequeo = 0;
        $add = false;


        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getNumDoc() == $newPasajero->getNumDoc()) {
                $chequeo = 1;
            }
        }

        if ($chequeo != 1) {
            $pasajerosCargados = $this->getPasajeros();
            $pasajerosCargados[] = $newPasajero;
            $this->setPasajeros($pasajerosCargados);
            $add = true;
        }
        return $add;
    }

// Modificar datos de los pasajeros.
    public function modificarPasajero($numDocumento, $nuevoNombre = null, $nuevoApellido = null, $nuevoNumDoc = null, $nuevoTelefono = null)
    {
        $modificado = false;

        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getNumDoc() == $numDocumento) {
                $modificado = true;

                if ($nuevoNombre !== null) {
                    $pasajero->setNombre($nuevoNombre);
                }
                if ($nuevoApellido !== null) {
                    $pasajero->setApellido($nuevoApellido);
                }
                if ($nuevoNumDoc !== null) {
                    $pasajero->setNumDoc($nuevoNumDoc);
                }
                if ($nuevoTelefono !== null) {
                    $pasajero->setTelefono($nuevoTelefono);
                }
            }
        }

        return $modificado;
    }

    // Modificar responsable del vuelo.
    public function modificarResponsable($nuevoNumEmpleado = null, $nuevoNombre = null, $nuevoApellido = null, $nuevoNumeroLicencia = null) {
        $modificado = false;

        if ($nuevoNumEmpleado !== null) {
            $this->responsableV->setNumeroEmpleado($nuevoNumEmpleado);
            $modificado = true;
        }

        if ($nuevoNumeroLicencia !== null) {
            $this->responsableV->setNumeroLicencia($nuevoNumeroLicencia);
            $modificado = true;
        }

        if ($nuevoNombre !== null) {
            $this->responsableV->setNombre($nuevoNombre);
            $modificado = true;
        }

        if ($nuevoApellido !== null) {
            $this->responsableV->setApellido($nuevoApellido);
            $modificado = true;
        }

        return $modificado;
    }

    // Método __toString()
    public function __toString()
    {
        return "Código del Viaje: " . $this->getCodigo() . "\n" .
            "Destino: " . $this->getDestino() . "\n" .
            "Cantidad Máxima de Pasajeros: " . $this->getMaxPasajeros() . "\n" .
             "Responsable del Viaje:\n" . $this->responsableV . "\n";
            "Pasajeros:\n" . $this->getPasajeros();
    }
}
