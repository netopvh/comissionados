let auditTable = $('#audit').DataTable({
    dom: "<'row'<'col-xs-12'<'col-xs-12'>>r>" +
    "<'row'<'col-xs-12't>>" +
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: {
        url: '/api/access/audit/',
        data: function (d) {
            d.event = $('#auditEvent').val();
            d.name = $('#auditUser').val();
        }
    },
    columns: [
        {
            className:      'details-control',
            orderable:      false,
            sortable: false,
            data:           null,
            defaultContent: '',
            width: '50px'
        },
        {data: 'id', name: 'id', width: '70px'},
        {data: 'event', name: 'event'},
        {data: 'users.nome', name: 'users.nome'},
        {data: 'created_at', name: 'created_at', width: '180px'},
    ]
});

/* Formatting function for row details - modify as you need */
function formatAudit ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" class="table table-bordered" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
        '<td width="120" class="text-bold">Tabela:</td>'+
        '<td>'+d.auditable_type+'</td>'+
        '</tr>'+
        '<tr>'+
        '<td class="text-bold">IP:</td>'+
        '<td>'+d.ip_address+'</td>'+
        '</tr>'+
        '</table>';
}

// Add event listener for opening and closing details
$('#audit tbody').on('click', 'td.details-control', function () {
    let tr = $(this).closest('tr');
    let row = auditTable.row( tr );

    if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
    }
    else {
        // Open this row
        row.child( formatAudit(row.data()) ).show();
        tr.addClass('shown');
    }
} );

$('#search-audit').on('submit', function (e) {
    auditTable.draw();
    e.preventDefault();
});