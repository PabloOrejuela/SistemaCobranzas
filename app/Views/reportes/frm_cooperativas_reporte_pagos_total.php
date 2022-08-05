<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-cash-register"></i>
                    <?= esc("Reporte de cobros Total"); ?>
                </div>
                <div class="card-body"> 
                    <form action="<?php echo base_url().'/get_reporte_cobros_total';?>" method="post" id="form-subir-excel" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container mb-5" style="margin-top:30px;">
                            <div class="mb-3 row">
                                <label for="date_desde" class="col-sm-2 col-form-label">Desde: </label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" name="date_desde" id="date" value="<?= date('Y-m-d');?>">
                                    <p id="error-message"><?= session('errors.date_desde');?> </p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="date_hasta" class="col-sm-2 col-form-label">Hasta: </label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" name="date_hasta" id="date" value="<?= date('Y-m-d');?>">
                                    <p id="error-message"><?= session('errors.date_hasta');?> </p>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-outline-secondary" formtarget="_blank" value="Reporte Total">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>