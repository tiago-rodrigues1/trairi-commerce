$(document).ready(function() {
    $('.quant_item').change(function() {
        if ($(this).val() < 1) {
            $(this).val(1);
        }
    
        var subtotal = 0;
    
        $('.quant_item').each(function() {
            subtotal += $(this).data('price') * Number($(this).val());
        });
    
        var total = subtotal + $('#frete').data('frete');
    
        $('#subtotal').text(subtotal.toFixed(2).replace('.', ','));
        $('#total').text(`Total: ${total.toFixed(2).replace('.', ',')}`);
    });
    
    $('#edit-destino').click(function() {
        $('#dest-inputs input').removeAttr('readonly');
    });
});