let tblCargos = $('#tblCargos');
tblCargos.DataTable({
    serverSide: true,
    processing: true,
    columnDefs: [
        {
            targets: 2,
            className: "text-center",
        }
    ],
    ajax: '/api/comissionado/cargos/',
    columns: [
        {data: 'id', name: 'id', width:'50px'},
        {data: 'descricao', name: 'descricao'},
        {data: 'action', orderable: false, searchable: false, width: '100px'}
    ]
});