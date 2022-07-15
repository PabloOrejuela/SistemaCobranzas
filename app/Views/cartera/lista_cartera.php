<div class="container mb-5">
    <form action="<?php echo base_url().'/getExcel';?>" method="post" id="form-subir-excel" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="container mb-5" style="margin-top:30px;">
            <div class="col-sm-5 mb-3">
                <h5>Subir archivo de cartera (.xls)</h5>
                <input class="form-control form-control-sm" type="file" name="tablaCartera" id="formFile" value="Subir archivo excel">
            </div>
            <div>
                <input type="submit" class="btn btn-outline-secondary" value="Subir archivo">
            </div>
        </div>
    </form>
        
        <hr />
        <h4>Cartera</h4>
    <table class="table table-bordered table-striped table-hover mt-5" id="table-cartera">
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
        //echo '<pre>'.var_export($cartera, true).'</pre>';exit;

        foreach ($cartera as $key => $value) {
            
            echo '<tr>
                    <td>'.$value->nombre.'</td>
                    <td>'.$value->cedula.'</td>
                    <td>'.$value->fecha_emision.'</td>
                    <td>'.$value->fecha_culminacion.'</td>
                    <td>'.$value->saldo_fecha.'</td>
                    <td>'.$value->valor_cuota.'</td>
                    <td>'.$value->cuotas_cancelar.'</td>
                    <td>'.$value->cuotas_canceladas.'</td>
                    <td>'.$value->tasa_interes.'</td>
                    <td>'.$value->tasa_mora.'</td>
                    <td>'.$value->subtotal.'</td>
                    <td>'.$value->comision.'</td>
                    <td>'.$value->coactiva.'</td>
                    <td>'.$value->total.'</td>   
                ';
            
            echo  '</tr>';
        }
        
    ?>
    </table>
</div>
<script>
    $('#table-cartera').DataTable( {
        paging: true ,
        "lengthMenu": [ 5, 10, 15 ],
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
