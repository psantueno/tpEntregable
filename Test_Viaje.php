<?php

include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'ResponsableV.php';

$unResponsable = new ResponsableV(147, 'ALI871', 'Jeremías', 'Lopez');
$viaje = new Viaje('ABC123', 'Destino', 2, $unResponsable);


do {
    echo "MENU:\n";
    echo "1. Cargar información del viaje\n";
    echo "2. Modificar datos de pasajeros\n";
    echo "3. Ver información del viaje\n";
    echo "4. Agregar pasajero al viaje\n";
    echo "5. Modificar responsable del vuelo\n";
    echo "6. Salir\n";

    $opcion = readline("Seleccione una opción: ");

    switch ($opcion) {
        case '1':
            $codigo = readline("Ingrese el código del viaje: ");
            $destino = readline("Ingrese el destino del viaje: ");
            $maxPasajeros = readline("Ingrese la cantidad máxima de pasajeros: ");
            $viaje->setCodigo($codigo);
            $viaje->setDestino($destino);
            $viaje->setMaxPasajeros($maxPasajeros);
            echo "Información del viaje cargada.\n";
            break;

        case '2':

            if (empty($viaje->getPasajeros())) {
                echo "No hay pasajeros cargados para el viaje: " . $viaje->getCodigo() . "\n";
            } else {

                $numDocumento = readline("Ingrese el número de documento del pasajero a modificar: ");
                $nuevoNombre = readline("Ingrese el nuevo nombre del pasajero (deje vacío si no desea modificar): ");
                $nuevoApellido = readline("Ingrese el nuevo apellido del pasajero (deje vacío si no desea modificar): ");
                $nuevoNumDoc = readline("Ingrese el nuevo número de documento del pasajero (deje vacío si no desea modificar): ");
                $nuevoTelefono = readline("Ingrese el nuevo teléfono del pasajero (deje vacío si no desea modificar): ");
                $modificado = $viaje->modificarPasajero($numDocumento, $nuevoNombre, $nuevoApellido, $nuevoNumDoc, $nuevoTelefono);
                if ($modificado) {
                    echo "Información del pasajero modificada correctamente.\n";
                } else {
                    echo "El pasajero no fue encontrado en este viaje.\n";
                }
            }
            break;

        case '3':
            echo "Información del viaje:\n";
            echo "-------------------------------\n";
            echo "Código: " . $viaje->getCodigo() . "\n";
            echo "Destino: " . $viaje->getDestino() . "\n";
            echo "Responsable del Viaje: \n" . $viaje->getResponsable();
            echo "Cantidad máxima de pasajeros: " . $viaje->getMaxPasajeros() . "\n";
            echo "Pasajeros:\n";
            $pasajeros = $viaje->getPasajeros();
            if (!empty($pasajeros)) {
                foreach ($pasajeros as $pasajero) {
                    echo $pasajero . "\n";
                }
            } else {
                echo "No hay pasajeros en este viaje.\n";
            }
            echo "-------------------------------\n";
            break;

        case '4':

            if (count($viaje->getPasajeros()) < intval($viaje->getMaxPasajeros())) {

                $nombre = readline("Ingrese el nombre del pasajero: ");
                $apellido = readline("Ingrese el apellido del pasajero: ");
                $numDoc = readline("Ingrese el número de documento del pasajero: ");
                $telefono = readline("Ingrese el teléfono del pasajero: ");
                $pasajeroNuevo = new Pasajero($nombre, $apellido, $numDoc, $telefono);
                $agregado = $viaje->agregarPasajero($pasajeroNuevo);
                if ($agregado) {
                    echo "Pasajero agregado al viaje correctamente.\n";
                } else {
                    echo "No se pudo agregar al pasajero al viaje porque ya existe.\n";
                }
            } else {
                echo "No se pudo agregar al pasajero porque no hay espacio disponible. Capacidad máxima de pasajeros: " . $viaje->getMaxPasajeros() . "\n";
            }
            break;

        case '5':
           
            $nuevoNumEmpleado = readline("Ingrese el nuevo número de empleado: ");
            $nuevoNombre = readline("Ingrese el nuevo nombre del responsable: ");
            $nuevoApellido = readline("Ingrese el nuevo apellido del responsable: ");
            $nuevoNumeroLicencia = readline("Ingrese el nuevo número de licencia del responsable: ");
            $modificado = $viaje->modificarResponsable($nuevoNumEmpleado, $nuevoNombre, $nuevoApellido, $nuevoNumeroLicencia);
            if ($modificado) {
                echo "Información del responsable modificada correctamente. El empleado responsable del vuelo es: " . $viaje->getResponsable();
            } else {
                echo "No se pudo modificar la información del responsable.\n";
            }
            break;


            break;

        case '6':
            echo "Saliendo del programa. ¡Hasta luego!\n";
            break;

        default:
            echo "Opción no válida. Por favor, seleccione una opción válida.\n";
            break;
    }
} while ($opcion != 6);
