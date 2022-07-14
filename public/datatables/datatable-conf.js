$(document).ready( function () {
    $('#table-miembros').DataTable({
        language: {
            processing:     "Procesamiento en curso...",
            search:         "Buscar:",
            lengthMenu:     "Listar _MENU_ filas",
            info:           "Mostrando  _START_ al _END_ de _TOTAL_ registros",
            infoEmpty:      "Mostrando 0 al 0 de 0 registros",
            infoFiltered:   "(Filtrado entre _MAX_ registros en total)",
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
        },
        "lengthMenu": [ 5, 10, 15, 20 ]
    });
} );