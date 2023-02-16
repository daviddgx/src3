<?php
session_start();
include '../LQS_EUQ/Connect.php';
include '../LQS_EUQ/LST_BDGS.php';
date_default_timezone_set('America/Guatemala');
$fecha = date("d") . '-' . date("m") . '-' . date("Y");

if ($_SESSION['Usuario'] == '') {
    header('Location: ../Innet/505.html');
} else {
}

// Variables de entorno
$MensajeExito = '';
$Mensajeerror = '';

// Fin de la conexion
// Validar formulario y grabar informacion

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/Sertero/LogoCBP.png">
<title>Henkel CBP / AdminFIFO</title>
<!-- This page plugin CSS -->
<link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
<link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
<link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
<!-- Custom CSS -->
<link rel="stylesheet" href="../dist/css/Custom/PreLoaderStyle.css">
<link href="../dist/css/Custom/adminContainer.css" rel="stylesheet">
<link href="../dist/css/style.min.css" rel="stylesheet">
<link href="../dist/css/Custom/ConEst.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
    Select{
        height: 10px !important;}

    .nav-tabs.nav-bordered li a.active {
        border-bottom: 2px solid #ed3131;
    }

    a {
        color: #ed3131;
        background-color: transparent;
    }

    .btn-Sertero {
        color: #fff;
        background-color: #ed3131;
        border-color: #ff0008;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #ed3131;
        border-color: #e60000;
    }

    .bg-light {
        background-color: #e8eaec00 !important;
    }

    .tab-content {
        overflow: hidden;
        position: relative;
        z-index: 1;
    }

</style>

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
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>

                <div class="navbar-brand">
                    <!-- Logo icon -->
                    <a href="index.php">
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/Sertero/LogoCBP.png" width="auto" height="40" class="" -->
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" width="auto" height="10"
                                 class="light-logo"/>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" width="auto"
                                     height="40"/>
                            <!-- Light Logo text -->
                                <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage"/>
                            </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <ul class="navbar-nav float-right"> <p id="status" class="online">Online</p>
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
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="../assets/images/users/<?php echo $_SESSION['pic']; ?> " alt="user"
                                 class="rounded-circle"
                                 width="40">
                            <span class="ml-2 d-none d-lg-inline-block"><span>Bienvenido,</span> <span
                                        class="text-dark"> <?php echo $_SESSION['USR']; ?> </span> <i
                                        data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

                            <a class="dropdown-item" href="javascript:PerfilAdminFifo()"><i data-feather="settings"
                                                                                            class="svg-icon mr-2 ml-1"></i>
                                Mi Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:Salir();"><i data-feather="power"
                                                                                   class="svg-icon mr-2 ml-1"></i>
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

                        <div class="card-body">
                            <h4 class="card-title">Mantenimiento de Bodegas</h4>
                            <h6 class="card-subtitle">Revise la configuración de las bodegas registradas </h6>
                            <br>
                            <?php echo $Mensajeerror; ?>
                            <?php echo $MensajeExito; ?>
                            <br>

                            <!--                                    Barra de acciones-->
                            <nav class="navbar navbar-expand-lg navbar-light bg-light ">


                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ">
                                        <li class="nav-item active">
                                            <a class="btn btn-outline-success" style="margin-left: 2rem" href="Crear_Bodega.php"><span > Crear Bodega </span></a>
                                        </li>


                                    </ul>
                                </div>
                            </nav>
                            <br>

                            <!--                                    Tabla con acciones-->
                            <form role="form" action="" method="post" class="">
                                <table id="example" class="table table-striped  " cellspacing="0" width="100%">
                                    <thead>


                                    <th>Bodega</th>
                                    <th>Nombre</th>
                                    <th>Posiciones</th>
                                    <th>Posiciones Ocupadas</th>
                                    <th>% Ocupado</th>
                                    <th>Estado</th>
                                    <th>Posiciones</th>
                                    <th>Detalle</th>
                                    <th>Editar</th>



                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < $lista_Productos; $i++) {
                                        echo "<tr>";

                                        echo "<td>";
                                        echo $lista_Productos['Nombre_Bodega'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $lista_Productos['Descripcion'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $lista_Productos['posiciones'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $lista_Productos['CapacidadActual'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo bcdiv((($lista_Productos['CapacidadActual'] / $lista_Productos['posiciones']) * 100),'1', 2) ." %";
                                        echo "</td>";

                                        echo "<td>";
                                        echo $lista_Productos['estado'];
                                        echo "</td>";
                                        echo "<td>";
                                        echo '<a href="MantenimientoPosiciones.php?Guia=' . $lista_Productos['Nombre_Bodega'] . '"class="icon-social-dropbox  btn btn-Sertero"></a>';
                                        echo "</td>";

                                        echo "<td>";
                                        echo '<a href="DetalleBodegas.php?Guia=' . $lista_Productos['Nombre_Bodega'] . '"class="fas fa-list-alt btn btn-Sertero"></a>';
                                        echo "</td>";

                                        echo "<td>";
                                        echo '<a href="EditarBodega.php?Guia=' . $lista_Productos['Nombre_Bodega'] . '" class="fas fa-edit btn btn-Sertero "></a>';
                                        echo "</td>";



                                        echo "</tr>";

                                        $lista_Productos = $ejecutar_sentencia_Productos->fetch(PDO::FETCH_ASSOC);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </form>
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
            2023 ® All Rights Reserved by Sertero. Designed and Developed by <a
                    href="https://qbit-Lab.com">Qbit-Lab</a>.
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
        $('#example').DataTable( {
            language: {
                url: 'datatables_espanol.json'
            }

        } );
    } );
</script>
</body>

</html>