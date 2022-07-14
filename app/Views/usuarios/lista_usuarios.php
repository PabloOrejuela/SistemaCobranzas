<div class="container mb-5">
        
    <div class="container mb-5" style="margin-top:30px;">
        <div class="col-4 mb-3">
            <h5>Registrar un nuevo usuario</h5>
        </div>
        <div>
            <a class="btn btn-outline-secondary" href="<?php echo base_url().'/nuevo_usuario';?>">Nuevo Usuario</a>
        </div>
    </div>
    
    <hr />
    <h4>Usuarios registrados</h4>
    <table class="table table-bordered table-striped table-hover mt-5" id="table-usuarios">
        <thead>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Rol</th>
        </thead>
    <?php 
        //echo '<pre>'.var_export($membresias, true).'</pre>';
        csrf_field();
        foreach ($lista_usuarios as $key => $value) {
            
            echo '<tr>
                    <td>'.$value->nombre.'</td>
                    <td>'.$value->cedula.'</td>
                    <td>'.$value->email.'</td>
                    <td>'.$value->direccion.'</td>
                    <td>'.$value->telefono.'</td>';        
            
                    if ($value->idrol == 1) {
                        echo '<td>Superadministrador</td>';
                    }elseif($value->idrol == 2){
                        echo'<td>Administrador</td>';
                    }else{
                        echo'<td>Cobrador</td>';
                    }
            
            echo  '</tr>';
        }
        
    ?>
    </table>
</div>
<script>
    $('#table-usuarios').DataTable( {
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
