function enviaDados(id){
    
    $.ajax({
        url: "/listadados/"+id
      })
      .done(function(data) {
        //console.log(data.carga_horaria);
        $("#editarcertificado").modal({
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

function verDados(id){
    $.ajax({
      url: "/certificado/detalhes/"+id
    })
    .done(function(data) {
      //console.log(data);
      $("#avaliarcertificado").modal({
        show:true
      });
      $("#id").val(data.id_certificado);
      $("#tipo").val(data.tipo);
      $("#inicio").val(data.inicio);
      $("#termino").val(data.termino);
      $("#cargahoraria").val(data.carga_horaria);
    },
  );
}