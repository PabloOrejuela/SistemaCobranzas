<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-cash-register"></i>
                    <?= esc($title); ?>
                </div>
                <div class="card-body"> 
                    <form action="<?php echo base_url().'/getExcel';?>" method="post" id="form-subir-excel" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container mb-5" style="margin-top:30px;">
                            <div class="col-sm-5 mb-3">
                                <h5>Subir archivo de cartera (.xls)</h5>
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