<div class="container-sm" id="div-cobros">
    <div id="div-titulo"><h3>Registrar un pago</h3></div>
    <?= session()->getFlashdata('error'); ?>
    <?= csrf_field(); ?>
    <div class="col-md-8">
        <form action="<?php echo base_url().'/insertPago';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre: </label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control" id="staticEmail" value="<?= $deuda->nombre ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Cedula: </label>
                        <div class="col-sm-6">
                        <input type="text" readonly class="form-control" id="staticEmail" value="<?= $deuda->cedula ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-3 col-form-label">Cuotas restantes: </label>
                    <div class="col-sm-5">
                        <input type="text" readonly class="form-control" id="staticEmail" value="<?= $deuda->cuotas_cancelar - $deuda->cuotas_canceladas ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Total: </label>
                        <div class="col-sm-6">
                        <input type="text" readonly class="form-control" id="staticEmail" value="<?= $deuda->total ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Valor de la couta:</label>
                        <div class="col-sm-5">
                        <input type="text" readonly class="form-control" id="staticEmail" value="<?= $deuda->valor_cuota ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Abono:</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputPassword" name="abono" placeholder="0.00" value="<?= old('abono'); ?>">
                        <p id="error-message"><?= session('errors.abono');?> </p>
                    </div>
                    
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Método:</label>
                        <div class="col-sm-6">
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="idmetodo_pago" 
                                id="idmetodo_pago" 
                                onChange="onChangeActiveInput();"   
                            >
                            <?php
                                
                                if (old('idmetodo_pago') == '1') {
                                    echo '<option value="0">--Método de pago--</option>
                                            <option value="1" selected>EFECTIVO</option>
                                            <option value="2">DEPOSITO</option>
                                            <option value="3">TRANSFERENCIA</option>';
                                }elseif (old('idmetodo_pago') == 2) {
                                    echo '<option value="0">--Método de pago--</option>
                                            <option value="1">EFECTIVO</option>
                                            <option value="2" selected>DEPOSITO</option>
                                            <option value="3">TRANSFERENCIA</option>';
                                }elseif (old('idmetodo_pago') == 3) {
                                    echo '<option value="0">--Método de pago--</option>
                                            <option value="1">EFECTIVO</option>
                                            <option value="2">DEPOSITO</option>
                                            <option value="3" selected>TRANSFERENCIA</option>';
                                }else{
                                    echo '<option value="0" selected>--Método de pago--</option>
                                            <option value="1">EFECTIVO</option>
                                            <option value="2">DEPOSITO</option>
                                            <option value="3">TRANSFERENCIA</option>';
                                }
                            ?>
                            </select>
                            <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="num_documento" class="col-sm-2 col-form-label">Documento:</label>
                        <div class="col-sm-6">
                        <textarea 
                            type="text" 
                            class="form-control" 
                            disabled="true" 
                            name="documento" 
                            id="documento" 
                            placeholder="Datos documento"
                            maxlength=120
                        ></textarea>
                        <p id="contador">0 caracteres</p>
                    </div>
                    
                </div>
                <?= form_hidden('idcartera', $idcartera); ?>
                <input type="submit" class="btn btn-outline-dark" value="Registrar Abono">
            </form>
    </div>
</div>

<script type="text/javascript">
    $(function onChangeActiveInput() {
        $("#idmetodo_pago").change( function() {
            if ($(this).val() === "1") {
                $("#documento").prop("disabled", true);
            } else {
                $("#documento").prop("disabled", false);
            }
        });
    });

    //Contador de caracteres
    const mensaje = document.getElementById('documento');
    const contador = document.getElementById('contador');

    mensaje.addEventListener('input', function(e) {
        const target = e.target;
        const longitudMax = target.getAttribute('maxlength');
        const longitudAct = target.value.length;
        contador.innerHTML = `${longitudAct}/${longitudMax + ' caracteres máximo'}`;
    });
</script>