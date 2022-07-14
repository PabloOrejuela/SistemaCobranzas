<div class="container mb-5">
    <form action="<?php echo base_url().'/getExcel';?>" method="post">
        <?= csrf_field(); ?>
        <div class="container mb-5" style="margin-top:30px;">
            <div class="col-4 mb-3">
                <h5>Subir archivo de cartera (.xls)</h5>
                <input type="file" value="Subir archivo excel">
            </div>
            <div>
                <input type="submit" class="btn btn-secondary" value="Subir archivo">
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
            <th>Observación</th>
            <th>Estado</th>
        </thead>
        <tbody>
            <tr>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
                <td>Datos</td>
            </tr>
        </tbody>
    <?php 
        //echo '<pre>'.var_export($membresias, true).'</pre>';
/*
        foreach ($cartera as $key => $value) {
            
            echo '<tr>
                    <td>'.$value->nombre.'</td>
                    <td>'.$value->cedula.'</td>
                    <td>'.$value->fecha_inicio.'</td>
                    <td>'.$value->fecha_final.'</td>';
                    echo '<td style="text-align:center;">'.$value->total.'</td>';
                    if ($saldo <= ($value->total /3) ){
                        echo '<td style="text-align:center;color:red;">'.$saldo.'</td>';
                    }else{
                        echo '<td style="text-align:center;">'.$saldo.'</td>';
                    }
                    
                    
            
                    if ($value->status == 1) {
                        echo '<td>ACTIVA</td>';
                    }else{
                        echo'<td>INACTIVA</td>';
                    }
                    
                    if ($value->status == 1) {
                        echo '<td style="text-align:center;">
                                <a type="button" id="btn-register" href="asistencia/'.$value->idmembresias.'" 
                                    class="registro" data-bs-toggle="modal" data-bs-target="#asistenciaModal" 
                                    onClick="pasaIdmembresia('.$value->idmembresias.','. $saldo.');">
                                </a>
                            </td>
                        <td style="text-align:center;"><a type="button" id="btn-register" href="edit/'.$value->idmembresias.'" class="edit"></a></td>';
                    }else{
                        echo '<td style="text-align:center;">CADUCADA</td>
                        <td style="text-align:center;"><a type="button" id="btn-register" href="edit/'.$value->idmembresias.'" class="edit"></a></td>';
                    }
            
            echo  '</tr>';
        }
        */
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
