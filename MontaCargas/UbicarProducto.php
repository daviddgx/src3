<?php
ob_start();
include "../Innet_MTC/Innet_MTC.php";
//Capturar el registro
$IDRegistro = $_GET['Guia'];
$IDH = $_GET['IDH'];
$Ubicacion = $_GET['Ubicacion'];

date_default_timezone_set('America/Guatemala');
$Fecha = date("Y") . '-' . date("m") . '-' . date("d"). ' '. date("H") .':'. date("i") . ':' . date("s") ;

// PENDIENTE //
// Actualizar los datos
//1. Actualizar ESTADO de la tabla Asignaciones a Ingresado
IngresarProducto($IDRegistro,$Fecha);
//2. Actualizar la BITACORA para registrar el Movimiento
$Evento = "Ingreso";
$TipoEvento = "Operacion";
$EstadoAnterior = "Por Ingresar";
$EstadoNuevo ="Ingresado ID_Registro: ".$IDRegistro;
RegistrarBitacora($IDRegistro,$Fecha,$IDH,$Evento,$TipoEvento,$EstadoAnterior,$EstadoNuevo);
//3. Actualizar el estado de la Ubicacion con el ID calcular si necesita cuarentena y poner los valores.
//3.1 Traer Datos del Producto
//3.2 Crear las variables con los datos del producto
ActualizarUbicacion($IDRegistro,$Ubicacion);

//Redireccionar la pagina a Lista_Asignaciones.php
header('Location: Lista_Asignaciones.php');
ob_end_flush();


?>