let lastIdx = null;
let tblUsersRowIndentify = $('table[data-form="tblUsersRowIdentify"]');
let tblUsers = $('#tblUsers');

//Forms
let formCreateUser = $('#formCreateUser');
let formUpdateUser = $('#formUpdateUser');

//Botões dos Formulários
let btnCreateUser = $('#btnCreateUser');
let btnUpdateUser = $('#btnUpdateUser');

let tblUsersDatatable = tblUsers.DataTable({
    dom: "<'row'<'col-xs-12'f<'col-xs-12'>>r>" +
    "<'row'<'col-xs-12't>>" +
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    responsive: true,
    columnDefs: [
        {
            targets: 5,
            className: "text-center"
        }
    ],
    ajax: '/api/access/users/',
    columns: [
        {data: 'id', name: 'users.id', width: '70px'},
        {data: 'nome', name: 'users.nome'},
        {data: 'email', name: 'users.email'},
        {data: 'display_name', name: 'roles.display_name'},
        {data: 'active', name: 'active', width: '100px'},
        {data: 'action', orderable: false, searchable: false, width: '90px'}
    ]
});

$('.datatable-highlight tbody').on('mouseover', 'td', function() {
    let colIdx = tblUsersDatatable.cell(this).index().column;

    if (colIdx !== lastIdx) {
        $(tblUsersDatatable.cells().nodes()).removeClass('active');
        $(tblUsersDatatable.column(colIdx).nodes()).addClass('active');
    }
}).on('mouseleave', function() {
    $(tblUsersDatatable.cells().nodes()).removeClass('active');
});

//Ação para Definir Status do Usuário
tblUsersRowIndentify.on('click','.ativa', function (e) {
    e.preventDefault();
    let vm = $(this);
    $.ajax({
        url:'/api/access/users/' + vm.data('id')+'/status',
        type: "patch",
        data:{
            active: vm.data('value')
        },
        success:function(){
            swal({
                title: "Sucesso!",
                text: "Usuário ativado com sucesso!",
                icon: "success",
            });
            tblUsersDatatable.ajax.reload( null, false );
        },
        errors: function (data) {
            swal({
                title: "Sucesso!",
                text: data.error,
                icon: "error",
            });
        }
    });
});

//Ação para desativar usuário
tblUsersRowIndentify.on('click','.desativa', function (e) {
    e.preventDefault();
    let vm = $(this);
    $.ajax({
        url:'/api/access/users/' + vm.data('id') + '/status',
        type: "patch",
        data:{
            active: vm.data('value')
        },
        success:function(){
            swal({
                title: "Sucesso!",
                text: "Usuário desativado com sucesso!",
                icon: "success",
            });
            tblUsersDatatable.ajax.reload( null, false );
        },
        errors: function (data) {
            swal({
                title: "Sucesso!",
                text: data.error,
                icon: "error",
            });
        }
    });
});

//Ação para Cadastrar Usuário
btnCreateUser.click(function () {
    formCreateUser.submit();
});
//Ação para Atualizar Usuário
btnUpdateUser.click(function () {
    formUpdateUser.submit();
});