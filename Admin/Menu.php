<?php
?>

<!-- Sidebar navigation-->

<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item "><a class="sidebar-link sidebar-link" href="index.php"
                                     aria-expanded="false"><i data-feather="home"
                                                              class="feather-icon"></i><span
                    class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Tareas</span></li>

        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i data-feather="file-text"
                                                             class="feather-icon"></i><span
                    class="hide-menu">Guias </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">


                <li class="sidebar-item"><a href="Guias_CargarGuia.php" class="sidebar-link"><span
                                class="hide-menu"> Cargar Guia
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Traking_Guias.php" class="sidebar-link"><span
                                class="hide-menu"> Seguimiento <br> de Guias
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Guias_AsignarTransportista.php" class="sidebar-link"><span
                                class="hide-menu"> Asignar <br> Transportista
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Guias_AsignarPikeador.php" class="sidebar-link"><span
                                class="hide-menu"> Asignar <br> Pickeador
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="AsignarUbicaciones.php" class="sidebar-link"><span
                                class="hide-menu"> Confirmar <br> Ubicaciones
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="ConteoCiegoPrevio.php" class="sidebar-link"><span
                                class="hide-menu"> Conteo Ciego <br>Previo
                                        </span></a>
                </li>

                <li class="sidebar-item"><a href="ConteoCiegoPosterior.php" class="sidebar-link"><span
                            class="hide-menu"> Conteo Ciego <br> Posterior
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Guias_ConsultaGuas.php" class="sidebar-link"><span
                            class="hide-menu"> Consultar <br> Guias
                                        </span></a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i
                    class="fas fa-tags"></i><span
                    class="hide-menu">Inventario Ciclico </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="Invent_CrearRevision.php" class="sidebar-link"><span
                            class="hide-menu"> Crear revisión
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Invent_Anotaciones.php" class="sidebar-link"><span
                            class="hide-menu"> Ingresar anotación
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Invent_ImprimirResultados.php" class="sidebar-link"><span
                            class="hide-menu"> Imprimir resultados
                                        </span></a>
                </li>

            </ul>
        </li>

        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i
                    class="fas fa-truck"></i><span
                    class="hide-menu">Trazabilidad </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="Trazabilidad_IDH.php" class="sidebar-link"><span
                            class="hide-menu"> Por IDH
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Trazabilidad_Lote.php" class="sidebar-link"><span
                            class="hide-menu"> Por Lote
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Trazabilidad_Fecha.php" class="sidebar-link"><span
                            class="hide-menu"> Por Fecha
                                        </span></a>
                </li>


            </ul>
        </li>





        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i
                    class="fas fa-list-alt"></i><span
                    class="hide-menu">Reportes </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="Reportes_Ocupacion.php" class="sidebar-link"><span
                            class="hide-menu"> Ocupación
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Reportes_Toneladas.php" class="sidebar-link"><span
                            class="hide-menu"> Toneladas <br> Despachadas
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Reportes_Item.php" class="sidebar-link"><span
                            class="hide-menu"> Ocupación por Item
                                        </span></a>
                </li>

                <li class="sidebar-item"><a href="Reportes_Despachos.php" class="sidebar-link"><span
                            class="hide-menu"> % de despacho
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Reportes_Kardex.php" class="sidebar-link"><span
                            class="hide-menu"> Kardex
                                        </span></a>
                </li>


            </ul>
        </li>


        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Mantenimiemtos</span></li>

        <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="Mantenimiento_Productos.php"
                                    aria-expanded="false"><i
                    class="fas fa-dolly"></i><span
                    class="hide-menu">Productos
                                </span></a>
        </li>
        <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="Mantenimiento_Bodegas.php"
                                    aria-expanded="false"><i
                    class="fas fa-warehouse"></i><span
                    class="hide-menu">Bodegas
                                </span></a>
        </li>


        <li class="sidebar-item"><a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i
                    class="fas fa-user"></i><span
                    class="hide-menu">Usuarios </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="Usuarios_Admin.php" class="sidebar-link"><span
                            class="hide-menu"> Administradores
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Usuarios_Inventarios.php" class="sidebar-link"><span
                            class="hide-menu"> Inventarios
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Usuarios_Operadores.php" class="sidebar-link"><span
                            class="hide-menu"> Operadores Forklift
                                        </span></a>
                </li>
                <li class="sidebar-item"><a href="Usuarios_DashBoard2.php" class="sidebar-link"><span
                            class="hide-menu"> Dash Board
                                        </span></a>
                </li>

            </ul>
        </li>

    </ul>
</nav>
<!-- End Sidebar navigation -->


