$(document).ready(function() {
    $('.detalhar').click(function() {
        var pedido_id = $(this).data('pedido_id');
        
        var url = `/pedidos/detalhar/${pedido_id}`;

        $.get(url, function(data) {
            $('body').append(data);

            $('.close').click(function() {
                $(`#pd_${pedido_id}`).remove();
            });

            $('.tel').mask('(00) 0000-0000');
        });
    });
});