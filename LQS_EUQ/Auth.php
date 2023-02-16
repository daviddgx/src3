<?php
$error = "";
$mensajeExito = "";
$servername="localhost:3300";
$username="root";
$password="Inicio1994=";
$dbname="dbs9098416";
$servernamePDO="mysql:dbname=dbs9098416;host=localhost:3300";


try {
    //code...
    $pdo = new PDO($servernamePDO,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "Conectado..";
} catch (PDOException $th) {
    //throw $th;
    //echo "Error al conectar: ".$th->getMessage();
}

?>


