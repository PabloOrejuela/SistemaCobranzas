<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <?= esc($title).' - Fecha: '.date('Y-m-d h:m:s'); ?>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url().'/insert_visita';?>" method="post">
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
                                <label for="inputPassword" class="col-sm-2 col-form-label">Observacion:</label>
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control" id="inputPassword" name="observacion" placeholder="Escriba aquí la observación de la visita" value="<?= old('observacion'); ?>"></textarea>
                                        <p id="error-message"><?= session('errors.observacion');?> </p>
                                </div>
                            </div>
                            <?= form_hidden('idcartera', $idcartera); ?>
                            <input type="submit" class="btn btn-outline-dark" value="Registrar Visita">
                        </form>
                    </div>
            </div>
        </div>
    </main>

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