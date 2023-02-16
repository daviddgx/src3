<?php
session_start();
include '../LQS_EUQ/Connect.php';
include '../LQS_EUQ/LST_DespachosProduccion.php';
date_default_timezone_set('America/Guatemala');
$fecha = date("d") . '-' . date("m") . '-' . date("Y");
$hora = date(' h:i:s a', time());

if ($_SESSION['Usuario'] == '') {
    header('Location: ../Innet/505.html');
} else {
}

// Variables de entorno
$MensajeExito = '';
$Mensajeerror = '';


$txtIDH =  "";
$txtAlto =  "";
$txtDescripcion = "";
$txtBultos = "";
$txtBase =  "";
$txtFoto =  "";
$Produto = "Estoy limpio";
$Linea = "";
$txtTotalCardex = "";



// Fin de la conexion


// Validar formulario y grabar informacion
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

switch ($accion) {

    case "btnBuscar":

        $MensajeError = '<div class="alert alert-danger" role="alert">
                                                <strong>Entro al boton Buscar   -- </strong> Entro al boton Buscar <br>
                                               
                                                
                                            </div>';

        $txtIDH = (isset($_POST['txtIDH'])) ? $_POST['txtIDH'] : "";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {

            $error =
                '<div class="alert alert-danger" role="alert"><p><strong>Existe un problema con la conexion entre el sistema y la base de datos ️! por favor contacte al administrador de la aplicacion e informele de este error.</div>';
            // $row = $result->fetch_assoc();
        } else {

            $sql = "SELECT IDH,Descripcion,Base,Altura,CAJASXPALET,LINEA,Foto FROM dbs9098416.productos where IDH = $txtIDH;";
            $result = $conn->query($sql);
            // Fin Obtencion de datos
            try {



                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $txtIDH = $row['IDH'];
                        $txtAlto = $row['Altura'];
                        $txtDescripcion = $row['Descripcion'];
                        $txtBase = $row['Base'];
                        $txtFoto = $row['Foto'];
                        $txtBultos = $row['CAJASXPALET'];
                        $txtLinea = $row['LINEA'];
                    }
                } else {
                    $Mensajeerror =
                        '<div class="alert alert-warning" role="alert"><br><p><strong> El Producto IDH: ' . $txtIDH . ' no existe, Notifique al responsable para registrarlo  </div>';
                }
            } catch (Exception $ex) {
                $Mensajeerror = '<div class="alert alert-secondary alert-dismissible bg-secondary text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Se encontro un error ️! -- </strong> ' . $ex . '
                                </div>';
            }
        }

        break;

    case "btnModificar":

        $txtIDH = (isset($_POST['txtIDH'])) ? $_POST['txtIDH'] : "";
        $txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
        $txtMarca = (isset($_POST['txtMarca'])) ? $_POST['txtMarca'] : "";
        $txtLINEA = (isset($_POST['txtLINEA'])) ? $_POST['txtLINEA'] : "";
        $txtUnidadPorMedida = (isset($_POST['txtUnidadPorMedida'])) ? $_POST['txtUnidadPorMedida'] : "";
        $txtUnidadDeMedida = (isset($_POST['txtUnidadDeMedida'])) ? $_POST['txtUnidadDeMedida'] : "";
        $txtBase = (isset($_POST['txtBase'])) ? $_POST['txtBase'] : "";
        $txtAltura = (isset($_POST['txtAltura'])) ? $_POST['txtAltura'] : "";
        $txtCajasPorPalet = (isset($_POST['txtCajasPorPalet'])) ? $_POST['txtCajasPorPalet'] : "";
        $txtPesoNetoUnitario = (isset($_POST['txtPesoNetoUnitario'])) ? $_POST['txtPesoNetoUnitario'] : "";
        $txtPesoBrutoUnitario = (isset($_POST['txtPesoBrutoUnitario'])) ? $_POST['txtPesoBrutoUnitario'] : "";
        $txtPesoNetoCaja = (isset($_POST['txtPesoNetoCaja'])) ? $_POST['txtPesoNetoCaja'] : "";
        $txtPesoBrutoCaja = (isset($_POST['txtPesoBrutoCaja'])) ? $_POST['txtPesoBrutoCaja'] : "";
        $txtFoto = (isset($_FILES['txtFoto']["name"])) ? $_FILES['txtFoto'] : "";
        $txtDiasCuarentena = (isset($_POST['txtDiasCuarentena'])) ? $_POST['txtDiasCuarentena'] : "";
        $txtDiasVencimiento = (isset($_POST['txtDiasVencimiento'])) ? $_POST['txtDiasVencimiento'] : "";
        $txtEstado = (isset($_POST['txtEstado'])) ? $_POST['txtEstado'] : "";
        $txtUnidadesMinimas = (isset($_POST['txtUnidadesMinimas'])) ? $_POST['txtUnidadesMinimas'] : "";
        $txtUnidadesMaximas = (isset($_POST['txtUnidadesMaximas'])) ? $_POST['txtUnidadesMaximas'] : "";



        //Actualizar datos del registro


        //$sentencia = $pdo->prepare('insert into dbs9098416.productos SET Descripcion=:Descripcion,  Marca=:Marca, LINEA=:LINEA, UNIDADESXMEDIDA=:UNIDADESXMEDIDA, UMEDIDA=:UMEDIDA, BASE=:BASE, ALTURA=:ALTURA, CAJASXPALET=:CAJASXPALET, PESONETOUNIDAD=:PESONETOUNIDAD, PESOBRUTOUNIDAD=:PESOBRUTOUNIDAD, PESONETOCAJA=:PESONETOCAJA, PESOBRUTOCAJA=:PESOBRUTOCAJA, DIASCUARENTENA=:DIASCUARENTENA, DIASVENCIMIENTO=:DIASVENCIMIENTO, ESTADO=:ESTADO, MINIMOPICKING=:MINIMOPICKING, MAXIMOPICKING=:MAXIMOPICKING where IDH=:IDH');

        try {
            $sentencia->bindParam(':IDH', $txtIDH);
            $sentencia->bindParam(':Descripcion', $txtDescripcion);
            $sentencia->bindParam(':Marca', $txtMarca);
            $sentencia->bindParam(':LINEA', $txtLINEA);
            $sentencia->bindParam(':UNIDADESXMEDIDA', $txtUnidadPorMedida);
            $sentencia->bindParam(':UMEDIDA', $txtUnidadDeMedida);
            $sentencia->bindParam(':BASE', $txtBase);
            $sentencia->bindParam(':ALTURA', $txtAltura);
            $sentencia->bindParam(':CAJASXPALET', $txtCajasPorPalet);
            $sentencia->bindParam(':PESONETOUNIDAD', $txtPesoNetoUnitario);
            $sentencia->bindParam(':PESOBRUTOUNIDAD', $txtPesoBrutoUnitario);
            $sentencia->bindParam(':PESONETOCAJA', $txtPesoNetoCaja);
            $sentencia->bindParam(':PESOBRUTOCAJA', $txtPesoBrutoCaja);
            $sentencia->bindParam(':DIASCUARENTENA', $txtDiasCuarentena);
            $sentencia->bindParam(':DIASVENCIMIENTO', $txtDiasVencimiento);
            $sentencia->bindParam(':ESTADO', $txtEstado);
            $sentencia->bindParam(':MINIMOPICKING', $txtUnidadesMinimas);
            $sentencia->bindParam(':MAXIMOPICKING', $txtUnidadesMaximas);



            $sentencia->execute();
        } catch (Exception $ex) {
        }
        // Bloque para actualizar la foto

        $fecha = new DateTime();
        $nombreArchivo = ($txtFoto["name"] != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtFoto"]["name"] : "imagen.jpg";
        $tmpFoto = $_FILES["txtFoto"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto, "../assets/images/Productos/" . $nombreArchivo);

            if (isset($Usuario["Foto"])) {
                if (file_exists("../assets/images/Productos/" . $Usuario["Foto"])) {
                    if ($Usuario["Foto"] != "imagen.jpg") {
                        unlink("../assets/images/Productos/" . $Usuario["Foto"]);
                    }
                }
            }

            $sentencia = $pdo->prepare("UPDATE dbs9098416.productos SET Foto=:Foto where IDH=:id;");
            $sentencia->bindParam(':Foto', $nombreArchivo);
            $sentencia->bindParam(':id', $txtIDH);
            echo '<br>';

            //$sentencia->execute();
            $_SESSION['pic'] = $nombreArchivo;
            $MensajeExito = '<div class="alert alert-secondary" role="alert">
                                                <strong>Excelente!   -- </strong> Los datos se actualizaron correctamente
                                            </div>';

            header('Location: Mantenimiento_Productos.php');
        }

        header('Location: Mantenimiento_Productos.php');
        break;

    default:
        break;
}



?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/Sertero/LogoCBP.png">
    <title>Henkel CBP / AdminFIFO</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../dist/css/Custom/PreLoaderStyle.css">
    <link href="../dist/css/Custom/adminContainer.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link href="../dist/css/Custom/ConEst.css" rel="stylesheet">
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="preloader">
            <br></br>
            <div class="logoPre">
                <img src="../assets/images/Sertero/LogoHenkel.png" width="200px" height="auto">
                <!-- Sertero<span style="color:#e88733">CBP</span> -->
            </div>
            <div class="loader-frame">
                <div class="loader1" id="loader1"></div>
                <div class="loader2" id="loader2"></div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

                <div class="navbar-brand">
                    <!-- Logo icon -->
                    <a href="index.php">
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/Sertero/LogoCBP.png" width="auto" height="40" class="" -->
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" width="auto" height="10" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" width="auto" height="40" />
                            <!-- Light Logo text -->
                                <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

                    <!-- ============================================================== -->
                    <!-- create new -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="settings" class="svg-icon"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="javascript:ReloadPage();">Actualizar Pagina</a>


                        </div>
                    </li>


                </ul>

                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <p id="status" class="online">Online</p>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <!--                    <li class="nav-item d-none d-md-block">-->
                    <!--                        <a class="nav-link" href="javascript:void(0)">-->
                    <!--                            <form>-->
                    <!--                                <div class="customize-input">-->
                    <!--                                    <input class="form-control custom-shadow custom-radius border-0 bg-white"-->
                    <!--                                           type="search" placeholder="Search" aria-label="Search">-->
                    <!--                                    <i class="form-control-icon" data-feather="search"></i>-->
                    <!--                                </div>-->
                    <!--                            </form>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../assets/images/users/<?php echo $_SESSION['pic']; ?> " alt="user" class="rounded-circle" width="40">
                            <span class="ml-2 d-none d-lg-inline-block"><span>Bienvenido,</span> <span class="text-dark"> <?php echo $_SESSION['USR']; ?> </span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

                            <a class="dropdown-item" href="javascript:PerfilAdminFifo()"><i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                                Mi Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:Salir();"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                Salir</a>

                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar navigation-->
            <?php include 'Menu.php'; ?>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                        Bienvenido <?php echo $_SESSION['USR']; ?>!!</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"> <?php echo '<div class="user_admin dropdown"><span class="user_adminname">Fecha: ' . $fecha . '</span></div>'; ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-5 align-self-center">
                    <div class="customize-input float-right">

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->



        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">



                        <div class="card-body ">
                            <h4 class="card-title">Datos para Imprimir Ingresos</h4>
                            <h6 class="card-subtitle">Cree las etiquetas de identificación de productos</h6>
                            <br>
                            <?php echo $Mensajeerror; ?>
                            <?php echo $MensajeExito; ?>
                            <br>


                            <div>
                                <!-- Contenido del Formulario-->

                                <div class="my-content formulario">
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-body">


                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Codigo del Producto</label>
                                                        <input name="txtIDH" type="text" class="form-control" value="<?php echo $txtIDH ?>" required>

                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <br>
                                                        <button type="submit" value="btnBuscar" name="accion" class=" col-md-8 btn btn-outline-success  justify-content: center; align-items: center; ">Buscar
                                                        </button>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Descripcion</label>
                                                        <input name="txtDescripcion" type="text" class="form-control" value="<?php echo $txtDescripcion; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>No. Documento de Ingreso</label>
                                                        <input name="txtIDIngreso" type="text" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Fecha de Recepcion</label>

                                                        <input name="txtFechaRec" type="text" class="form-control" value="<?php echo $fecha; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Origen</label>

                                                        <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                            <option style="display:none; height:50px;" value="" class="ng-binding">
                                                                --- ORIGEN ---
                                                            </option>

                                                            <option value="Blanco">
                                                                Produccion
                                                            </option>

                                                            <option value="Amarillo">
                                                                Importacion
                                                            </option>

                                                            <option value="Normal">
                                                                Devolucion
                                                            </option>
                                                            <option value="Normal">
                                                                Maquilador
                                                            </option>

                                                            <option value="Normal">
                                                                Rechazo
                                                            </option>

                                                            <option value="Normal">
                                                                Boega Externa
                                                            </option>




                                                        </select>
                                                    </div>
                                                </div>



                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Fotografia</label>
                                                        <div class="input-group mb-12">
                                                            <?php if ($txtFoto != "") { ?>
                                                                <br />
                                                                <img style="border-radius: 30px !important;" class="img-thumbnail rounded mx-auto d-block" width="200px" src="../assets/images/Productos/<?php echo $txtFoto; ?>">
                                                                <br />
                                                                <br />
                                                            <?php } ?>


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <!--INICIO Row para Elemento de formulario -->
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Hora</label>
                                                        <input name="txtHora" type="text" class="form-control" value="<?php echo $hora; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Turno</label>
                                                        <input name="txtTurno" type="text" class="form-control" value="1">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Pallet</label>
                                                        <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                            <option style="display:none; height:50px;" value="" class="ng-binding">
                                                                --- TIPO DE PALLET ---
                                                            </option>

                                                            <option value="Blanco">
                                                                Naranja
                                                            </option>

                                                            <option value="Amarillo">
                                                                Blanco
                                                            </option>

                                                            <option value="Normal">
                                                                Jaula
                                                            </option>




                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Clave Receptor</label>
                                                        <input name="txtClaveReceptor" type="text" class="form-control" value="<?php echo $_SESSION['Usuario']; ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Montacarguista</label>
                                                        <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                            <option style="display:none; height:50px;" value="" class="ng-binding">
                                                                --- Montacarguista ---
                                                            </option>

                                                            <?php
                                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                                            $cargos = "SELECT concat(Nombre,' ',Apellido)as NombreMont, Nombre_Usuario FROM dbs9098416.usuarios_app where TipoUsuario = 2;";

                                                            $result = $conn->query($cargos);
                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {

                                                                    echo '<option value="' . $row['Nombre_Usuario'] . '">' . utf8_encode($row['NombreMont']) . '</option>';
                                                                }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>


                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label># Lote</label>
                                                        <input name="txtDescripcion" type="text" class="form-control" value="G.M <?php echo $fecha; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- FIN Row para Elemento de formulario -->

                                            <!--INICIO Row para Elemento de formulario -->
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Base</label>
                                                        <input name="txtUnidadPorMedida" type="number" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $txtBase; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Alto</label>
                                                        <input name="txtBase" type="number" id="base" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $txtAlto; ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Tot. Bultos</label>
                                                        <input name="txtBase" type="number" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $txtBultos; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Codigo de Barras</label>
                                                        <svg data-value="<?php echo $txtIDH ?>" data-text="<?php echo $txtIDH ?>" class="codigo" /></svg>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Cantidad de Ingresos</label>
                                                        <input name="txtBase" type="number" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $txtTotalCardex; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>


                                            </div>

                                        </div>

                                    <!--  </form> -->

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">Ubicacion del Producto</h4>
                            <h6 class="card-subtitle">Seleccione la ubicacion donde se colocara el producto</h6>

                            <div class="my-content formulario">
                                <!--    <form role="form" action="" method="post" enctype="multipart/form-data"> -->
                                    <div class="form-body">
                                        <br>
                                        <h3 class="card-subtitle">Seleccione la ubicacion Inicial</h3>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">



                                                    <label>Bodega</label>

                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                        <option style="display:none; height:50px;" value="" class="ng-binding">
                                                            --- Bodega ---
                                                        </option>
                                                        <?php
                                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                                        $cargos = "SELECT Nombre_Bodega,Descripcion FROM dbs9098416.warehauses;";

                                                        $result = $conn->query($cargos);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                echo '<option value="' . $row['Nombre_Bodega'] . '">' . utf8_encode($row['Descripcion']) . '</option>';
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Area</label>
                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                        <option style="display:none; height:50px;" value="" class="ng-binding">
                                                            --- Area ---
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Posicion</label>
                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                        <option style="display:none; height:50px;" value="" class="ng-binding">
                                                            --- Posicion ---
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nivel</label>
                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                        <option style="display:none; height:50px;" value="" class="ng-binding">
                                                            --- Nivel ---
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h3 class="card-subtitle">Seleccione la ubicacion Final</h3>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">



                                                    <label>Bodega</label>

                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                        <option style="display:none; height:50px;" value="" class="ng-binding">
                                                            --- Bodega ---
                                                        </option>
                                                        <?php
                                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                                        $cargos = "SELECT Nombre_Bodega,Descripcion FROM dbs9098416.warehauses;";

                                                        $result = $conn->query($cargos);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                echo '<option value="' . $row['Nombre_Bodega'] . '">' . utf8_encode($row['Descripcion']) . '</option>';
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Area</label>
                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                        <option style="display:none; height:50px;" value="" class="ng-binding">
                                                            --- Area ---
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Posicion</label>
                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                        <option style="display:none; height:50px;" value="" class="ng-binding">
                                                            --- Posicion ---
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nivel</label>
                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" name="txtUMedida" id="idtxtUMedida" ng-model="properties.value" ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues" ng-required="properties.required" ng-disabled="properties.disabled">
                                                        <option style="display:none; height:50px;" value="" class="ng-binding">
                                                            --- Nivel ---
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 centrado">
                                            <div class="form-group">
                                                <button type="submit" value="btnRegistrar" name="accion" class="btn btn-outline-success">Registrar e imprimir
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
            2023 ® All Rights Reserved by Sertero. Designed and Developed by <a href="https://qbit-Lab.com">Qbit-Lab</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="../dist/js/app-style-switcher.js"></script>
<script src="../dist/js/feather.min.js"></script>
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="../assets/extra-libs/c3/d3.min.js"></script>
<script src="../assets/extra-libs/c3/c3.min.js"></script>
<script src="../assets/libs/chartist/dist/chartist.min.js"></script>
<script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
<script src="../dist/js/OnLine.js"></script>
<!--Scripts para DataTables-->
<!--This page plugins -->
<script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            language: {
                url: 'datatables_espanol.json'
            }

        });
    });
</script>

<script src="../dist/js/JsBarcode.all.min.js"></script>
</body>
<script>
    JsBarcode(".codigo").init();
</script>
</body>

</html>