$('.allow-edit').click(function() {
    var form = $(this).data('formtarget');

    $(`${form} input[readonly], textarea`).removeAttr('readonly');
    $(`${form} input[type=radio], input[type=checkbox]`).removeAttr('disabled');
    $(form).append(`
        <button type="submit" class="btn tc-btn mt-3">Salvar</button>
        <a class="btn tc-btn-ghost-red" href="/usuario/perfil">Cancelar</button>
    `);
});