<div class="container mb-5 col-md-8">
    <div id="div-titulo"><h3>Reportes de Cobros</h3></div>
    <table class="table table-bordered table-striped table-hover mt-5 col-md-6" id="table-reportes">
        <thead>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Pedir Reporte</th>
        </thead>
    <?php 
        //echo '<pre>'.var_export($membresias, true).'</pre>';
        csrf_field();
        foreach ($lista_usuarios as $key => $value) {
            
            echo '<tr>
                    <td>'.$value->nombre.'</td>
                    <td>'.$value->cedula.'</td>
                    <td>'.$value->email.'</td>
                    <td>'.$value->telefono.'</td>';
            echo '<td>
                        <a href="'.site_url().'form_reporte_cobro/'.$value->idusuario.'" >
                            <img src="'.site_url().'public/img/report.svg" id="img-button"/>
                        </a>
                    </td>'; 
            echo  '</tr>';
        }
        
    ?>
    </table>
</div>
<script>
    $('#table-reportes').DataTable( {
        paging: true ,
        "lengthMenu": [ 5, 10 ],
        language: {
            processing:     "Procesamiento en curso...",
            search:         "Buscar:",
            lengthMenu:     "Listar _MENU_ filas",
            info:           "",
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
