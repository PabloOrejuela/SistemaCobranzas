<div class="container-sm" >
    <div id="wrap">
        <div class="row g-2">
            <div class="col-12 mt-5">
                <div class="p-3 border bg-light" id="form-login">
                <?= session()->getFlashdata('error') ?>
                <?= service('validation')->listErrors() ?>
                    <h4><?= esc($title) ?></h4>
                    
                    <form action="<?php echo base_url().'/validate_credentials';?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-3 mr-10 col-form-label" id="label-login">Usuario:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="form-control" name="name" placeholder="usuario">
                            </div>
                            <p><?= session('errors.name');?> </p>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-3 mr-10 col-form-label" id="label-login" >Contraseña:</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="form-control" name="password" placeholder="****">
                            </div>
                            <p><?= session('errors.password');?> </p>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-secondary" value="Enviar" id="btn-login">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>