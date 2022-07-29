<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-users"></i>
                    <?= esc($title); ?>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url().'/recibe_nuevo_usuario';?>" method="post">
                        <?= session()->getFlashdata('error'); ?>
                        <?= csrf_field(); ?>
                        <div class="mb-1 row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre: </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"  name="nombre" value="<?= old('nombre'); ?>" placeholder="Nombre">
                                <p id="error-message"><?= session('errors.nombre');?> </p>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label for="cedula" class="col-sm-2 col-form-label">Cédula: </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="cedula" value="<?= old('cedula'); ?>" placeholder="cedula">
                                <p id="error-message"><?= session('errors.cedula');?> </p>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="staticEmail2" name="email" value="<?= old('email'); ?>" placeholder="email@example.com">
                                <p id="error-message"><?= session('errors.email');?> </p>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label for="telefono" class="col-sm-2 col-form-label">Teléfono: </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="telefono" value="<?= old('telefono'); ?>" placeholder="0991111234">
                                <p id="error-message"><?= session('errors.telefono');?> </p>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label for="direccion" class="col-sm-2 col-form-label">Dirección: </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="direccion" value="<?= old('direccion'); ?>" placeholder="22 Acacia Ave., Rue de L' Morgue">
                                <p id="error-message"><?= session('errors.telefono');?> </p>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label for="idrol" class="col-sm-2 col-form-label">Rol: </label>
                            <div class="col-sm-6">
                                <select class="form-select" aria-label="Default select example" value="<?= old('idrol'); ?>" name="idrol">
                                    <option value="0" selected>-- Escoja un rol para el usuario --</option>
                                    <option value="1">Superadministrador</option>
                                    <option value="2">Administrador</option>
                                    <option value="3">Cobrador</option>
                                </select>
                                <p id="error-message"><?= session('errors.idrol');?> </p>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline-secondary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </main>
