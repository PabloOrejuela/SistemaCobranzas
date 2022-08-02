<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <?= esc("Datos del cliente"); ?>
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
                            <input type="text" readonly class="form-control" id="card-body-seguimiento" value="<?= $cliente[0]->direccion; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-2 col-form-label">Teléfono domicilio: </label>
                            <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="card-body-seguimiento" value="<?= $cliente[0]->telefono_domicilio; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-2 col-form-label">Teléfono trabajo: </label>
                            <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="card-body-seguimiento" value="<?= $cliente[0]->telefono_trabajo; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <?= esc("Seguimiento"); ?>
                </div>
                <div class="card-body" id="card-body-seguimiento">
                    <table class="table table-bordered table-striped table-hover mt-5">
                        <thead>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Observación</th>
                        </thead>
                        <?php 
                            if (isset($seguimiento) && $seguimiento !== NULL) {
                                foreach ($seguimiento as $key => $value) {
                                
                                    echo '<tr>
                                            <td>'.$value->nombre.'</td>
                                            <td>'.$value->created_at.'</td>
                                            <td>'.$value->observacion.'</td>
                                        ';
                                    
                                    echo '</tr>';
                                    
                                }
                                //echo '<tr><td>Página renderizada en {elapsed_time} segundos</td></tr>';
                            }else{
                                echo   '<td colspan="14">NO HAY DATOS</td>';  

                            }
                            
                            
                        ?>  
                    </table>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <?= esc("Cobros"); ?>
                </div>
                <div class="card-body" id="card-body-seguimiento">
                    <table class="table table-bordered table-striped table-hover mt-5">
                        <thead>
                            <th>Fecha</th>
                            <th>Abono</th>
                            <th>Método pago</th>
                            <th>Documento</th>
                            <th>Subtotal</th>
                        </thead>
                        <?php 
                            if (isset($cobros) && $cobros !== NULL) {
                                $saldo = $cliente[0]->total;
                               
                                foreach ($cobros as $key => $value) {
                                    $saldo -= $value->abono; 
                                
                                    echo '<tr>
                                            <td>'.$value->created_at.'</td>
                                            <td>'.$value->abono.'</td>
                                            <td>'.$value->metodo_pago.'</td>
                                            <td>'.$value->documento.'</td>
                                            <td style="text-align:right;">$ '.number_format($value->abono, 2).'</td>
                                        ';
                                    
                                    echo '</tr>';
                                    
                                }
                                echo '<tr><td colspan="5"></td></tr>';
                                echo '<tr><td colspan="4" style="text-align:right;font-weight:bold;">MONTO:</td><td  style="text-align:right;">$ '.number_format($cliente[0]->total, 2).'</td></tr>';
                                echo '<tr><td colspan="4" style="text-align:right;font-weight:bold;">SALDO:</td><td  style="text-align:right;">$ '.number_format($saldo, 2).'</td></tr>';
                            }else{
                                echo   '<td colspan="14">NO HAY DATOS</td>';  

                            }
                            //echo '<tr><td>Página renderizada en {elapsed_time} segundos</td></tr>';
                            
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