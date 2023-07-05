function getProdutosByName(produtos, termo) {
    var produtosFiltrados = [];

    produtos.each(function() {
        var nome = $(this).children('td:nth-child(2)').text();
        var rgx = new RegExp(`${nome}`, 'gi');

        if (rgx.test(termo)) {
            produtosFiltrados.push($(this));
        }
    });

    return produtosFiltrados;
}

$(document).ready(function() {
    var produtos = $('.produto');

    $('#busca-catalogo').on('input', function() {
        var termo = $(this).val();

        var produtosFiltrados = getProdutosByName($(produtos), termo);

        if (produtosFiltrados.length > 0) {
            $('.produtos').children().remove();
            $('.produtos').append(produtosFiltrados);
        } else if (produtosFiltrados.length === 0 && termo) {
            $('.produtos').children().remove();
        } else {
            $('.produtos').children().remove();
            $('.produtos').append(produtos);
        }
    });

});