let tblCargos = $('#tblCargos');
tblCargos.DataTable({
    serverSide: true,
    processing: true,
    ajax: '/api/comissionado/cargos/',
    columns: [
        {data: 'id', name: 'id', width:'5%'},
        {data: 'descricao', name: 'descricao'},
        {data: 'action', orderable: false, searchable: false, width: '115px'}
    ]
});