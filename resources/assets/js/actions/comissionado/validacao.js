//Botões do de Validação
let btnValida = $('#btnValida');
let btnNaoValida = $('#btnNaoValida');

//Inputs do Formulario
let $form = $('.formValida');
txtValidado = $('#validado');

let tblValidacao = $('#tblValidacao');
let tblValidacaoDatatable = tblValidacao.DataTable({
    dom: "<'row'<'col-xs-12'<'col-xs-12'>>r>" +
    "<'row'<'col-xs-12't>>" +
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    serverSide: true,
    processing: true,
    ajax: {
        url: '/api/comissionado/validacoes/',
        data: function (d) {
            d.nome = $('#servidorNome').val();
            d.validado = $('#servidorValidado').val();
        }
    },
    columns: [
        {data: 'matricula', name: 'servidores.matricula', width:'5%'},
        {data: 'nome', name: 'servidores.nome',width:'30%'},
        {data: 'lotacao', name: 'secretaria.descricao'},
        {data: 'tipo', name: 'tipocargo.descricao', width:'10%'},
        {data: 'validado', orderable: false, width:'4%'},
        {data: 'action', orderable: false, searchable: false, width: '120px'}
    ]
});

$('#searchServidorValidacao').on('submit', function(e) {
    tblValidacaoDatatable.draw();
    e.preventDefault();
});

btnNaoValida.on('click',function(e){
    e.preventDefault();
    txtValidado.val('P');
    $('#confirm').modal({backdrop: 'static', keyboard: false})
        .on('click', '#prosseguir-btn', function () {
            $form.submit();
        });
});
btnValida.on('click',function(e){
    e.preventDefault();
    txtValidado.val('S');
    $('#confirm').modal({backdrop: 'static', keyboard: false})
        .on('click', '#prosseguir-btn', function () {
            $form.submit();
        });
});