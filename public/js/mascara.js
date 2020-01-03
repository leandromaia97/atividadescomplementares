$(document).ready(function(){
    $('#inicio').mask('00/00/0000', { placeholder: "__ /__ /____" });
    $('#termino').mask('00/00/0000', { placeholder: "__ /__ /____" });
    $('#editar_inicio').mask('00/00/0000', { placeholder: "__ /__ /____" });
    $('#editar_termino').mask('00/00/0000', { placeholder: "__ /__ /____" });
    $('#cep').mask('00000-000');
    $('#celular').mask('(00) 00000-0000');
    $('#cpf').mask('000.000.000-00');
});