<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cobranzas</title>
        <link href="<?= site_url(); ?>public/css/datatables.css" rel="stylesheet" />
        <link href="<?= site_url(); ?>public/css/styles.css" rel="stylesheet" />
        <script src="<?= site_url(); ?>public/js/font-awesome.js"></script>

        <script src="<?= site_url(); ?>public/js/jquery-3.6.0.min.js" ></script>
        <script src="<?= site_url(); ?>public/js/bootstrap.bundle.min.js" ></script>
        <script src="<?= site_url(); ?>public/js/scripts.js"></script>
        <script src="<?= site_url(); ?>public/js/simple-datatables@latest.js" crossorigin="anonymous"></script>
        <script src="<?= site_url(); ?>public/js/datatables-simple-demo.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= site_url(); ?>/caca"><img src="<?= site_url(); ?>public/img/cashier-logo.png" alt="logo" id="img-logo"></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <ul class="navbar-nav ms-auto  mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?= site_url();?>/salir" target="_self">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menú</div>
                            <!-- Menu Item -->
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuthCartera" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-cash-register"></i></div>
                                    Cartera
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuthCartera" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url(); ?>cartera">Lista cartera</a>
                                        <a class="nav-link" href="<?= site_url(); ?>subir_excel">Subir archivo excel</a>
                                    </nav>
                                </div>
                            </nav>
                            <!-- END Menú Item -->
                            <!-- Menu Item -->
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuthUsuarios" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                    Usuarios
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuthUsuarios" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url(); ?>usuarios">Lista usuarios</a>
                                        <a class="nav-link" href="<?= site_url(); ?>nuevo_usuario">Nuevo usuario</a>
                                    </nav>
                                </div>
                            </nav>
                            <!-- END Menú Item -->
                            <!-- Menu Item -->
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuthCobros" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                                    Cobros
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuthCobros" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url(); ?>cobros">Registrar un cobro</a>
                                    </nav>
                                </div>
                            </nav>
                            <!-- END Menú Item -->
                            <!-- Menu Item -->
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuthReportes" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                                    Reportes
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuthReportes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url(); ?>reportes">Lista usuarios para pedir reportes</a>
                                    </nav>
                                </div>
                            </nav>
                            <!-- END Menú Item -->

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Usuario: </div>
                        <?= $nombre; ?>
                    </div>
                </nav>
            </div>


<script>
    $('#table-usuarios').DataTable( {
        paging: true ,
        "lengthMenu": [ 5, 10 ],
        language: {
            processing:     "Procesamiento en curso...",
            search:         "Buscar:",
            lengthMenu:     "Listar _MENU_ filas",
            info:           "",
            infoEmpty:      "0 a 0 de 0 registros",
            infoFiltered:   "",
            infoPostFix:    "",
            loadingRecords: "Cargando...",
            zeroRecords:    "No hay registros para mostrar",
            emptyTable:     "Mo hay registros que coicidan",
            paginate: {
                first:      "Primero",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Último"
            },
            aria: {
                sortAscending:  ": activar para ordenar la columna de manera ascendente",
                sortDescending: ": activar para ordenar la columna de manera descendente"
            }
        }
    } );

</script>