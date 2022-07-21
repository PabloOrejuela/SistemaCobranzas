<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-users"></i>
                    <?= esc($title); ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover mt-5" id="datatablesSimple">
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
            </div>
        </div>
    </main>
<script>
    $('#datatablesSimple').DataTable( {
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
