$(document).ready(function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '#btn_editar', function() {
        var certificado_id = $(this).data('id');
        $.get('aluno.home', function(data) {
            $('#tipo').val(data.id);
            $('#inicio').val(data.id);
            $('#termino').val(data.id);
            $('#carga_horaria').val(data.id);
            $('#editarcertificado').modal('show');
        })//$(body)
    })
}
)