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
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date_hasta" class="col-sm-2 col-form-label">Desde: </label>
                <div class="col-md-4">
                <input type="date" class="form-control" name="date_hasta" id="date" value="<?= date('Y-m-d');?>">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-outline-primary mb-3">Generar reporte</button>
                </div>
            </div>
        </div>
    </form>
</div>

