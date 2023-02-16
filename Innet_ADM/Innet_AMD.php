<?php

function DarValorTotalPosiciones($Bodega){

    include '../LQS_EUQ/Auth.php';

    $sentencia = $pdo->prepare("SELECT count(1) as posiciones FROM dbs9098416.posiciones where Bodega = '".$Bodega."'");
    $sentencia->execute();
    $Count =  $sentencia->fetch(PDO::FETCH_LAZY);

    if ($Count['posiciones'] != 0){
        return  $Count['posiciones'];
    }else {
        return '0';
    }
}

function DarValorTotOperadores($Bodega){

    include '../LQS_EUQ/Auth.php';

    $sentencia = $pdo->prepare("SELECT count(DISTINCT(IDH)) as IDHs FROM dbs9098416.posiciones where Bodega = '".$Bodega."' and IDH not in (0);");
    $sentencia->execute();
    $Count =  $sentencia->fetch(PDO::FETCH_LAZY);

    if ($Count['IDHs'] != 0){
        return  $Count['IDHs'];
    }else {
        return '0';
    }
}

function DarValorListaLibres($Bodega){

    include '../LQS_EUQ/Auth.php';

    $sentencia = $pdo->prepare("SELECT count(1) as Libres FROM dbs9098416.posiciones where Bodega = '".$Bodega."' and Estado ='libre';");
    $sentencia->execute();
    $Count =  $sentencia->fetch(PDO::FETCH_LAZY);

    if ($Count['Libres'] != 0){
        return  $Count['Libres'];
    }else {
        return '0';
    }
}

function DarValorListaOcupadas($Bodega){

    include '../LQS_EUQ/Auth.php';

    $sentencia = $pdo->prepare("SELECT count(1) as Ocupadas FROM dbs9098416.posiciones where Bodega = '".$Bodega."' and Estado ='Ocupada';");
    $sentencia->execute();
    $Count =  $sentencia->fetch(PDO::FETCH_LAZY);

    if ($Count['Ocupadas'] != 0){
        return  $Count['Ocupadas'];
    }else {
        return '0';
    }
}
?>
