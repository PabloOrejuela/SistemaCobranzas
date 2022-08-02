<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <?= esc($title); ?>
                </div>
                <div class="card-body" id="card-body-seguimiento">
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre: </label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="card-body-seguimiento" value="<?= $cliente[0]->nombre ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-2 col-form-label">Cedula: </label>
                                <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="card-body-seguimiento" value="<?= $cliente[0]->cedula ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-2 col-form-label">Dirección: </label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="card-body-seguimiento" value="<?= $cliente[0]->direccion ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-2 col-form-label">Teléfono domicilio: </label>
                                <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="card-body-seguimiento" value="<?= $cliente[0]->telefono_domicilio ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-2 col-form-label">Teléfono trabajo: </label>
                                <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="card-body-seguimiento" value="<?= $cliente[0]->telefono_trabajo ?>">
                            </div>
                        </div>
                    
                    <table class="table table-bordered table-striped table-hover mt-5" id="datatablesSimple">
                        <thead>
                            <th>Cliente</th>
                            <th>Cédula</th>
                            <th>Fecha Emisión</th>
                            <th>Fecha culminación</th>
                            <th>Saldo</th>
                            <th>Cuota</th>
                            <th>Cant. Cuotas</th>
                            <th>Cuotas canceladas</th>
                            <th>Tasa Int.</th>
                            <th>Tasa Mora</th>
                            <th>Subtotal</th>
                            <th>Comisión</th>
                            <th>Coactiva</th>
                            <th>Total</th>
                        </thead>
                        <?php 
                            if (isset($cliente) && $cliente !== NULL) {
                                foreach ($cliente as $key => $value) {
                                
                                    echo '<tr>
                                            <td><a href="'.site_url().'cliente_resumen/'.$value->idcartera.'">'.$value->nombre.'</a></td>
                                            <td></td>
                                            <td></td>  
                                        ';
                                    
                                    echo '</tr>';
                                    echo '<tr><td>Página renderizada en {elapsed_time} segundos</td></tr>';
                                }
                            }else{
                                echo   '<td colspan="14">NO HAY DATOS</td>';  

                            }
                            
                            
                        ?>  
                    </table>
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