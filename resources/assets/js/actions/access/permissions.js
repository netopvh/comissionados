//Forms
let formCreatePermission = $('#formCreatePermission');
let formUpdatePermission = $('#formUpdatePermission');

//Botões dos Formulários
let btnCreatePermission = $('#btnCreatePermission');
let btnUpdatePermission = $('#btnUpdatePermission');

$('#permission').DataTable({
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
    ajax: '/api/access/permissions/',
    columns: [
        {data: 'id', name: 'permissions.id', width: '70px'},
        {data: 'display_name', name: 'permissions.display_name'},
        {data: 'groups.name',name: 'groups.name'},
        {data: 'action', orderable: false, searchable: false, width: '90px'}
    ]
});

$('.tree-default').jstree();

//Ação para Cadastrar Usuário
btnCreatePermission.click(function () {
    formCreatePermission.submit();
});
//Ação para Atualizar Usuário
btnUpdatePermission.click(function () {
    formUpdatePermission.submit();
});