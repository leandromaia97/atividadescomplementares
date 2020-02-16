function enviaDadosViewAluno(id){

    $.ajax({
        url: "/aluno/certificado/detalhes/editar/"+id
      })
      .done(function(data) {
        //console.log(data.carga_horaria);
        $("#editar_certificado").modal({
          show: true
        });
        $('#id').val(data.id_certificado);
        $('#editar_tipo').val(data.tipo);
        $('#editar_inicio').val(data.inicio);
        $('#editar_termino').val(data.termino);
        $('#editar_cargahoraria').val(data.carga_horaria);
      },
    );
}

function enviaDadosViewProfessor(id){
    $.ajax({
      url: "/professor/certificado/detalhes/avaliar/"+id
    })
    .done(function(data) {
      //console.log(data);
      $("#avaliar_certificado").modal({
        show:true
      });
      $("#id_certificado").val(data.id_certificado);
      $("#tipo").val(data.tipo);
      $("#inicio").val(data.inicio);
      $("#termino").val(data.termino);
      $("#cargahoraria").val(data.carga_horaria);
    },
  );
}

function excluirCertificado(id){
  $.ajax({
    url: "/aluno/certificado/delete/"+id
  })
  .done(function(data) {
    //console.log(data);
    $("#excluir_certificado").modal({
      show:true
    });
    $("#id_certificado_excluir").val(data.id_certificado);
    $("#nome_certificado").val(data.nome_certificado);
  },
  );
}

$(document).ready(function() {
    $("#alert-success").fadeTo(10000, 500).slideUp(500, function() {
        $("#alert-success").slideUp(500);
    });
});

$(document).ready(function() {
    $("#alert-danger").fadeTo(10000, 500).slideUp(500, function() {
        $("#alert-danger").slideUp(500);
    });
});
