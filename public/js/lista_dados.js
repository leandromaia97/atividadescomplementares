function enviaDados(id){
    
    $.ajax({
        url: "/listadados/"+id
      })
      .done(function(data) {
        //console.log(data.carga_horaria);
        $("#editarcertificado").modal({
          show: true
        });
        $('#id').val(data.certificados_id);
        $('#editar_tipo').val(data.tipo);
        $('#editar_inicio').val(data.inicio);
        $('#editar_termino').val(data.termino);
        $('#editar_cargahoraria').val(data.carga_horaria);
      }, 
    );
}