<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-cash-register"></i>
                    <?= isset($cartera[0]->empresa) ? esc($cartera[0]->empresa) : 'No hay datos'; ?>
                </div>
                <div class="card-body"> 
                    <table class="table table-bordered table-striped table-hover mt-5" id="datatablesSimple">
                        <thead>
                            <th>Credito</th>
                            <th>Cliente</th>
                            <th>Cédula</th>
                            <th>Fecha Emisión</th>
                            <th>Cuota</th>
                            <th>Cant. Cuotas</th>
                            <th>Cuotas canceladas</th>
                            <th>Subtotal</th>
                            <th>Coactiva</th>
                            <th>Saldo</th>
                        </thead>
                    <?php 
                    use App\Models\PagoModel;
                    $this->pagoModel = new PagoModel();
                        //echo '<pre>'.var_export($cartera, true).'</pre>';exit;
                        if (isset($cartera) && $cartera !== NULL) {
                            foreach ($cartera as $key => $value) {
                                $suma_abonos = $this->pagoModel->_getSumaPago($value->idcartera);
                                $saldo = $value->saldo_fecha - $suma_abonos;
                                //echo '<pre>'.var_export($value->idcartera .' | '.$value->total .' - '.$suma_abonos.': '.$saldo, true).'</pre>';
                                echo '<tr>
                                        <td>'.$value->credito.'</td>
                                        <td><a href="'.site_url().'cliente_resumen/'.$value->idcartera.'">'.$value->nombre.'</a></td>
                                        <td>'.$value->cedula.'</td>
                                        <td>'.$value->fecha_emision.'</td>
                                        <td>'.$value->valor_cuota.'</td>
                                        <td>'.$value->cuotas_cancelar.'</td>
                                        <td>'.$value->cuotas_canceladas.'</td>
                                        <td>'.$value->saldo_fecha.'</td>
                                        <td>'.$value->coactiva.'</td>
                                        <td style="text-align:right;">$ '.number_format($saldo, 2).'</td>   
                                    ';
                                
                                echo '</tr>';
                                
                            }
                            echo '<tr><td>Página renderizada en {elapsed_time} segundos</td></tr>';
                        }else{
                            echo   '<td colspan="14">NO HAY DATOS</td>';  

                        }
                        
                        
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
<script>
    $('#datatablesSimple').DataTable( {
        paging: true ,
        "lengthMenu": [ 3, 5, 10, 15 ],
        language: {
            processing:     "Procesamiento en curso...",
            search:         "Buscar:",
            lengthMenu:     "Listar _MENU_ filas",
            info:           "_START_ al _END_ de _TOTAL_ registros",
            infoEmpty:      "0 a 0 de 0 registros",
            infoFiltered:   "",
            infoPostFix:    "",
            loadingRecords: "Cargando...",
            zeroRecords:    "No hay registros para mostrar",
            emptyTable:     "Mo hay registros que coicidan",
            paginate: {
                first:      "Primero",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Último"
            },
            aria: {
                sortAscending:  ": activar para ordenar la columna de manera ascendente",
                sortDescending: ": activar para ordenar la columna de manera descendente"
            }
        }
    } );

</script>
