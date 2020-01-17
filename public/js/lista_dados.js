$(document).ready(function() {
    var table = $('#datatable').DataTable();

    table.on('click,', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);
        $('#tipo').val(data[1]);
        $('#inicio').val(data[2]);
        $('#termino').val(data[3]);
        $('#cargahoraria').val(data[4]);

        $('#formEditar').attr('action', 'editar_certificado'+data[0]);
        $('#editarcertificado').modal('show');

    });
});