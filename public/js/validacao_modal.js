jQuery(document).ready(function(){
    jQuery('#salva_dados').click(function(e){
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       jQuery.ajax({
          url: "{{ url('avaliar-certificado') }}",
          method: 'post',
          data: {
             situacao: jQuery('#situacao').val(),
             justificativa: jQuery('#justificativa').val(),
          },
          success: function(result){
              console.log(result);
              if(result.errors)
              {
                  jQuery('.alert-danger').html('');

                  jQuery.each(result.errors, function(key, value){
                      jQuery('.alert-danger').show();
                      jQuery('.alert-danger').append('<li>'+value+'</li>');
                  });
              }
              else
              {
                  jQuery('.alert-danger').hide();
                  $('#abrir_modal').hide();
                  $('#avaliarcertificado').modal('hide');
              }
          }});
       });
    });