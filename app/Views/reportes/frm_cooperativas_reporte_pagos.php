<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-cash-register"></i>
                    <?= esc("Reporte de cobros por cooperativas"); ?>
                </div>
                <div class="card-body"> 
                    <form action="<?php echo base_url().'/get_reporte_cobros_cooperativa';?>" method="post" id="form-subir-excel" enctype="multipart/form-data">
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
                            <div class="col-sm-6 mb-3">
                                <label for="idrol" class="col-sm-4 col-form-label">Cooperativa *: </label>
                                <select class="form-select" aria-label="Default select example" value="<?= old('idempresa'); ?>" name="idempresa">
                                    <option value="0" selected>-- Escoja una cooperativa --</option>
                                    <?php  
                                        if (isset($empresas) && $empresas !== NULL) {
                                            foreach ($empresas as $key => $value) {
                                                echo '<option value="'.$value->idempresa.'">'.$value->empresa.'</option>';
                                            }
                                        }else {
                                            echo '<option value="0" selected>-- No hay cooperativas registradas --</option>';
                                        }
                                    ?>
                                </select>
                                <p id="error-message"><?= session('errors.idrol');?> </p>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-outline-secondary" formtarget="_blank" value="Reporte">
                            </div>
                            <div class="mt-3">
                                <label for="">Los campos con * son obligatorios</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>