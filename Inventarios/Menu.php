<?php

?>

<!-- Sidebar navigation-->
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item "><a class="sidebar-link sidebar-link" href="index.php" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Tareas</span></li>

        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-print"></i><span class="hide-menu">Imprimir </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="Print_Cardex.php" class="sidebar-link"><span class="hide-menu"> Ingresos
                                        </span></a>
                </li>  <li class="sidebar-item"><a href="Print_CardexMasivo.php" class="sidebar-link"><span class="hide-menu"> Ingresos Masivo
                                        </span></a>
                </li>

            </ul>
        </li>

        <li class="sidebar-item"><a class="sidebar-link has-arrow " href="javascript:void(0)" aria-expanded="false"><i class="fas fa-clipboard-list"></i><span class="hide-menu">Inventarios </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="INV_Nuevo.php" class="sidebar-link"><span class="hide-menu"> Nuevo Fisico
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="INV_Consultas.php" class="sidebar-link"><span class="hide-menu"> Consultas
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="INV_Anotaciones.php" class="sidebar-link"><span class="hide-menu"> Anotaciones
                                        </span></a>
                </li>

            </ul>
        </li>
        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-dolly"></i><span class="hide-menu">Re Ubicaciones </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="RUBC_Nuevo.php" class="sidebar-link"><span class="hide-menu"> Reubicar Productos
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="RUBC_Consulta.php" class="sidebar-link"><span class="hide-menu"> Consultas
                                        </span></a>
                </li>


            </ul>
        </li>

        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-warehouse"></i><span class="hide-menu">Posiciones </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="Posiciones_Validar.php" class="sidebar-link"><span class="hide-menu"> Validar
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Posiciones_Corregir.php" class="sidebar-link"><span class="hide-menu"> Correcciones
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Posiciones_Bitacora.php" class="sidebar-link"><span class="hide-menu"> Historico
                                        </span></a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-chart-pie"></i><span class="hide-menu">Consultas </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="Consultar_Ingresos.php" class="sidebar-link"><span class="hide-menu"> Ingresos
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Consultar.php" class="sidebar-link"><span class="hide-menu"> Produccion
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Posiciones_Bitacora.php" class="sidebar-link"><span class="hide-menu"> Tiempos
                                        </span></a>
                </li>


            </ul>
        </li>


    </ul>



</nav>
<!-- End Sidebar navigation -->
