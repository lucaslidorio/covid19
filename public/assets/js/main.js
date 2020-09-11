//Inicia os Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
//Função dinâmica para colocar mascara no campo de CPF e CNPJ conforme a quantidade
//de caracteres digitado
$("#documento").keydown(function(){
  try {
      $("#documento").unmask();
  } catch (e) {}

  var tamanho = $("#documento").val().length;

  if(tamanho < 11){
      $("#documento").mask("999.999.999-99");
  } else {
      $("#documento").mask("99.999.999/9999-99");
  }
  // ajustando foco
  var elem = this;
  setTimeout(function(){
      // mudo a posição do seletor
      elem.selectionStart = elem.selectionEnd = 10000;
  }, 0);
  // reaplico o valor para mudar o foco
  var currentValue = $(this).val();
  $(this).val('');
  $(this).val(currentValue);
});
//Fim da função de mascara dinâmica

//Função Geral
$(document).ready(function () {
   //Inicia os campos para o plugin MASK
   $('.dataMascara').mask('00/00/0000', {placeholder: "__/__/____"});
   $('.placaMascara').mask('AAA-0000');
   $('.cpfMascara').mask('000.000.000-00', {reverse: true});
   //#####Horas####
   //Mascaras para os campos de horas
   $('.horaMinMascara').mask('00:00', {placeholder: "__:__"});
   //mascara para Cpf Geral
   //$('#cpf').mask('000.000.000-00', {reverse: true});
   //mascara para Cnpj Geral
   $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
   //mascara para o cep 
   $('.cep').mask('00000-000');
   //mascara para o Celular
   $('.celular').mask('(00)00000-0000');
  //Fim da inicialização dos campor MASK

  //Inicia o plugin select2 nos input que possuir a classe select2
  $('.select2').select2({
    theme: "bootstrap",
    width: null
  });
  //Inicia e traduz o plugin DataTables onde possui a classe dataTables
  $('.dataTables').DataTable(
    {
      //Tradução do dataTables
      "pagingType": "simple_numbers",
      "language": {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "Exibir _MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
        },
        "oAria": {
          "sSortAscending": ": Ordenar colunas de forma ascendente",
          "sSortDescending": ": Ordenar colunas de forma descendente"
        }
      }
      //Fim da Tradução dataTables
    }

  );
 
});

//Configura os campos CPF e CNPJ para aparecer conforme o select 
$(function () {
  $('#cpf').hide();
  $('#cnpj').hide();
  $('#tipoDocumento').change(function () {
    var $valor = $(this).val();
    if ($valor == 0) {
      $('#documento').prop("disabled", true);
      $('#nomeFantasia').prop("disabled", true);
      $('#inscricaoEstadual').prop("disabled", true);
      $('#documento').show();
      $('#labelCpfCnpj').text('CPF / CNPJ:');
    }
    if ($valor == 1) {
      $('#documento').prop("disabled", false);
      $('#documento').prop("placeholder", 'CPF');
      $('#nomeFantasia').prop("disabled", true);
      $('#nomeFantasia').prop("placeholder", '');
      $('#inscricaoEstadual').prop("disabled", true);
      $('#inscricaoEstadual').prop("placeholder", '');
      $('#labelCpfCnpj').text('CPF:');
      $('#labelNomeRazao').text('Nome:');
      $('#nome').prop("placeholder", 'Digite o nome');
    }

    if ($valor == 2) {
      $('#documento').prop("disabled", false);
      $('#documento').prop("placeholder", 'CNPJ');
      $('#nome').prop("placeholder", 'Digite a razão social da empresa');
      $('#nomeFantasia').prop("disabled", false);
      $('#nomeFantasia').prop("placeholder", 'Digite o nome fantasia');
      $('#inscricaoEstadual').prop("disabled", false);
      $('#inscricaoEstadual').prop("placeholder", 'Digite a inscrição estadual');
      $('#labelCpfCnpj').text('CNPJ:');
      $('#labelNomeRazao').text('Razão Social:');
    }

  });




});
