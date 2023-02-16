<?php
ob_start();
//require('Config_Guias.php');
include '../LQS_EUQ/Auth.php';
include '../LQS_EUQ/Connect.php';

// Create connection
if (isset($_GET['Guia'])) {$conexion = new mysqli($servername, $username, $password, $dbname);
$Transporte = $_GET['Guia'];
$Entrega = $_GET['Entrega'];


    //$consulta = "update dbs9098416.Guias set Estatus = 'Despachando' where Transporte ='".$Transporte."' and Entrega ='".$Entrega."' ;";
    $consulta = "insert into dbs9098416.despachos
   SELECT null,Transporte,Entrega,Material,P.Descripcion,Ubicacion,(select Rampa from Guias  where Transporte =  '".$Transporte."' and Entrega = '".$Entrega."'),CONVERT_TZ(NOW(), @@session.time_zone, 'America/Guatemala'),null,(select Montacarguista from Guias  where Transporte =  '".$Transporte."' and Entrega = '".$Entrega."'),'Pendiente' FROM dbs9098416.DetalleGuias 
   inner Join dbs9098416.productos P on Material=P.IDH
   where Transporte = '".$Transporte."' and Entrega = '".$Entrega."';";

    try {
        $resultado = $conexion->query($consulta);

        try {
            $consulta = "update dbs9098416.Guias set Estatus = 'Despachando' where Transporte ='".$Transporte."' and Entrega ='".$Entrega."' ;";
            $resultado = $conexion->query($consulta);


            header('Location:Traking_Guias.php');
        } catch (Exception $e) {


        exit;
    }

        header("Location: Traking_Guias.php");
        exit;
    } catch (Exception $e) {

        header('Location:Traking_Guias.php');
        exit;
    }
}else{
    header('Location: Traking_Guias.php');
}

ob_end_flush();
?>


