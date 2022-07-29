<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-users"></i>
                    <?= esc($title).' - Elija una Cooperativa para ver la cartera'; ?>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url().'/recibe_nuevo_usuario';?>" method="post">
                        <?= session()->getFlashdata('error'); ?>
                        <?= csrf_field(); ?>
                        <div class="mb-1 row">
                            <label for="idrol" class="col-sm-2 col-form-label">Cooperativa: </label>
                            <div class="col-sm-6">
                                <select class="form-select" aria-label="Default select example" value="<?= old('idrol'); ?>" name="idrol">
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
                        </div>
                        <input type="submit" class="btn btn-outline-secondary" value="Enviar"/>
                    </form>
                </div>
            </div>
        </div>
    </main>
