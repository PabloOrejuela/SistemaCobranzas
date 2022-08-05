<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-cash-register"></i>
                    <?= esc("Subir pagos anteriores"); ?>
                </div>
                <div class="card-body"> 
                    <form action="<?php echo base_url().'/getExcel';?>" method="post" id="form-subir-excel" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container mb-5" style="margin-top:30px;">
                            <div class="col-sm-6 mb-3">
                                <label for="idrol" class="col-sm-2 col-form-label">Cooperativa: </label>
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
                            <div class="col-sm-5 mb-3">
                                <h5>Subir archivo de pagos (.csv)</h5>
                                <input class="form-control form-control-sm" type="file" name="tablaCartera" id="formFile" value="Subir archivo excel">
                            </div>
                            <p id="error-message"><?= session('errors.tablaCartera');?> </p>
                            <div>
                                <input type="submit" class="btn btn-outline-secondary" value="Subir archivo">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>