$(document).ready(function() {
    $('#produtosTable').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
        },
        initComplete: function() {
            $('.dataTables_wrapper > div:nth-child(odd) > div:nth-child(2)').addClass('d-flex justify-content-end');
        }
    });

    

    $('div.toolbar').html('');
});