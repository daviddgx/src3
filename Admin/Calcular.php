<?php
ob_start();
//require('Config_Guias.php');
include '../LQS_EUQ/Auth.php';
include '../LQS_EUQ/Connect.php';

// Create connection
if (isset($_GET['Guia'])) {
    $conexion = new mysqli($servername, $username, $password, $dbname);
$Transporte = $_GET['Guia'];
$Entrega = $_GET['Entrega'];


    $consulta = "UPDATE dbs9098416.DetalleGuias AS dg
JOIN (
  SELECT p.IDH, p.Ubicacion
  FROM dbs9098416.posiciones AS p
  WHERE p.EstatusProducto IN (' ', '')
 ORDER BY p.LoteProduccion asc, p.Ubicacion desc
) AS p
ON dg.Material = p.IDH
SET dg.Ubicacion = p.Ubicacion
WHERE dg.Transporte = '".$Transporte."' AND dg.Entrega = '".$Entrega."';";

    try {
        $resultado = $conexion->query($consulta);

        try {
            $consulta = "update dbs9098416.Guias set Estatus ='FiFo Calculado' where Transporte = '".$Transporte."' and Entrega = '".$Entrega."'";

            $resultado = $conexion->query($consulta);


            header("Location: AsignarUbicaciones.php");
            exit;

        } catch (Exception $e) {

            header('Location: AsignarUbicaciones.php');
            exit;
        }

    } catch (Exception $e) {

        header('Location: AsignarUbicaciones.php');
        exit;
    }
}else{
    header('Location: Traking_Guias.php');
}

ob_end_flush();
?>


