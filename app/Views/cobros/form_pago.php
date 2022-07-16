<div class="container-sm" id="div-cobros">
    <div id="div-titulo"><h3>Registrar un pago</h3></div>
    <?= session()->getFlashdata('error'); ?>
    <?= csrf_field(); ?>
    <div class="col-md-8">
        <form action="insertPago" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre: </label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control" name="nombre" id="staticEmail" value="<?= $deuda->nombre ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Cedula: </label>
                        <div class="col-sm-6">
                        <input type="text" readonly class="form-control" name="nombre" id="staticEmail" value="<?= $deuda->cedula ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-3 col-form-label">Cuotas restantes: </label>
                    <div class="col-sm-5">
                        <input type="text" readonly class="form-control" name="nombre" id="staticEmail" value="<?= $deuda->cuotas_cancelar - $deuda->cuotas_canceladas ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Total: </label>
                        <div class="col-sm-6">
                        <input type="text" readonly class="form-control" name="nombre" id="staticEmail" value="<?= $deuda->total ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Valor de la couta:</label>
                        <div class="col-sm-5">
                        <input type="text" readonly class="form-control" name="nombre" id="staticEmail" value="<?= $deuda->valor_cuota ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Abono:</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputPassword" name="abono" placeholder="0.00">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Método:</label>
                        <div class="col-sm-6">
                            <select class="form-select" aria-label="Default select example" name="idmetodo_pago">
                                <option value="0" selected>--Método de pago--</option>
                                <option value="1">EFECTIVO</option>
                                <option value="2">DEPOSITO</option>
                                <option value="3">TRANSFERENCIA</option>
                            </select>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Documento:</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="num_documento" id="staticEmail" placeholder="Número de documento">
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-dark" value="Registrar Abono">
                <?= form_hidden('idcartera', $idcartera); ?>
            </form>
    </div>
</div>
    
