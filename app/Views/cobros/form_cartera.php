<div class="container-md" id="div-cobros">
    <div id="div-titulo"><h3>Cobros</h3></div>
    <table class="table table-bordered table-striped table-hover mt-5" id="table-cartera">
        <thead>
            <th>Cliente</th>
            <th>Cédula</th>
            <th>Saldo</th>
            <th>Cuota</th>
            <th>Cant. Cuotas</th>
            <th>Cuotas canceladas</th>
            <th>Tasa Int.</th>
            <th>Tasa Mora</th>
            <th>Subtotal</th>
            <th>Comisión</th>
            <th>Total</th>
            <th>Reg. Pago</th>
        </thead>
    <?php 
        //echo '<pre>'.var_export($cartera, true).'</pre>';exit;
        if (isset($cartera) && $cartera !== NULL) {
            foreach ($cartera as $key => $value) {
            
                echo '<tr>
                        <td>'.$value->nombre.'</td>
                        <td>'.$value->cedula.'</td>
                        <td>'.$value->saldo_fecha.'</td>
                        <td>'.$value->valor_cuota.'</td>
                        <td>'.$value->cuotas_cancelar.'</td>
                        <td>'.$value->cuotas_canceladas.'</td>
                        <td>'.$value->tasa_interes.'</td>
                        <td>'.$value->tasa_mora.'</td>
                        <td>'.$value->subtotal.'</td>
                        <td>'.$value->comision.'</td>
                        <td>'.$value->total.'</td>   
                    ';
                echo '<td><a href="'.site_url().'form_pago/'.$value->idcartera.'" ><img src="'.site_url().'public/img/pay_cash.svg"/></a></td>'; 
                echo  '</tr>';
            }
        }else{
            echo   '<td colspan="14">NO HAY DATOS</td>';  

        }
        
        
    ?>
    </table>
</div>
<script>
    $('#table-cartera').DataTable( {
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
