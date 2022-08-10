<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-cash-register"></i>
                    <?= isset($pagos[0]->empresa) ? esc($pagos[0]->empresa) : 'Lista de pagos'; ?>
                </div>
                <div class="card-body"> 
                    <table class="table table-bordered table-striped table-hover mt-5" id="datatablesSimple">
                        <thead>
                            <th>Credito</th>
                            <th>Cliente</th>
                            <th>Cédula</th>
                            <th>Fecha pago</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                    <?php 
                        //echo '<pre>'.var_export($cartera, true).'</pre>';exit;
                        if (isset($pagos) && $pagos !== NULL) {
                            foreach ($pagos as $key => $value) {
                            
                                echo '<tr>
                                        <td>'.$value->credito.'</td>
                                        <td>'.$value->nombre.'</td>
                                        <td>'.$value->cedula.'</td>
                                        <td>'.$value->fecha_pago.'</td>';
                                echo '<td>
                                        <a href="'.site_url().'editar_pago/'.$value->idpagos.'" class="btn btn-info">
                                            <i class="fa-solid fa-file-pen"></i>
                                        </a>
                                    </td>';
                                echo '<td>
                                        <a href="'.site_url().'borrar_pago/'.$value->idpagos.'" class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>';
                                echo '</tr>';
                                
                            }
                            echo '<tr><td colspan="14">Página renderizada en {elapsed_time} segundos</td></tr>';
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
