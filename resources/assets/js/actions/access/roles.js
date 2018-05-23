//Forms
let formCreateRole = $('#formCreateRole');
let formUpdateRole = $('#formUpdateRole');

//Botões dos Formulários
let btnCreateRole = $('#btnCreateRole');
let btnUpdateRole = $('#btnUpdateRole');

let rolesTable = $('#roles').DataTable({
    dom: "<'row'<'col-xs-12'f<'col-xs-12'>>r>" +
    "<'row'<'col-xs-12't>>" +
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    responsive: true,
    columnDefs: [
        {
            targets: 3,
            className: "text-center",
        }
    ],
    ajax: '/api/access/roles/',
    columns: [
        {data: 'id', name: 'id', width: '70px'},
        {data: 'display_name', name: 'display_name'},
        {data: 'description', name: 'description'},
        {data: 'action', orderable: false, searchable: false, width: '90px'}
    ]
});

$(document).on('click', '.tree label', function(e) {
    $(this).next('ul').slideToggle();
    e.stopPropagation();
});
$(document).on('change', '.tree input[type=checkbox]', function(e) {
    $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
    $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
    e.stopPropagation();
});

//Ação para Cadastrar Perfis
btnCreateRole.click(function () {
    formCreateRole.submit();
});
//Ação para Atualizar Perfis
btnUpdateRole.click(function () {
    formUpdateRole.submit();
});