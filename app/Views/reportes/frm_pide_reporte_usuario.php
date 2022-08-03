<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-chart-line"></i>
                    <?= esc($title); ?>
                </div>
                <div class="card-body">
                    <div class="container mb-5 col-md-12">
                        <div id="div-titulo"><h3>Reporte de Cobros: <?= esc($usuario->nombre); ?> </h3></div>
                        <form class="row g-3" method="post" action="<?php echo base_url().'/reporteCobrosUsuarioFechas';?>">
                            <?= csrf_field(); ?>
                            <h5>Por favor elija un rango de fechas para generar el reporte</h5>
                            <div class="col-md-6 mt-5">
                                <div class="mb-3 row">
                                    <label for="date_desde" class="col-sm-2 col-form-label">Desde: </label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" name="date_desde" id="date" value="<?= date('Y-m-d');?>">
                                        <p id="error-message"><?= session('errors.date_desde');?> </p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date_hasta" class="col-sm-2 col-form-label">Desde: </label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" name="date_hasta" id="date" value="<?= date('Y-m-d');?>">
                                        <p id="error-message"><?= session('errors.date_hasta');?> </p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-5">
                                        <?= form_hidden('idusuario', $usuario->idusuario); ?>
                                        <p id="error-message"><?= session('errors.idusuario');?> </p>
                                        <input type="submit" class="btn btn-outline-primary mb-3" value="Generar" formtarget="_blank" >
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

