$(document).ready(function () {

    $("#cpf").mask("###.###.###-##");
    $("#telefone").mask("(##) ####-####");

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
            spOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

    $('.sp_celphones').mask(SPMaskBehavior, spOptions);

    $(".dadosConsulta").hide();

    $('#modalCadastro').on('hidden.bs.modal', function () {
        $(".dadosConsulta").hide();
    })

});

function consultaCpf() {

    $(".dadosConsulta").slideDown(2000);

}

function abreModalCadastro() {
    $("#modalCadastro").modal('show');
}

function carregaUfs() {
    $.ajax({
        type: "POST",
        url: '../funcoes/funcoesLogin.php',
        data: {funcao: "carregaUfs"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            /*$('#modeloEditarCarro').find('option').remove();

            $("#modeloEditarCarro").append("<option value=''>Selecione</option>");

            $.each(test, function (i, item) {
                $("#modeloEditarCarro").append("<option id=" + item.id + " descricao=" + item.descmodelo + ">" + item.descmodelo + "</option>")
            });

            $("#modeloEditarCarro option").each(function ()
            {
                if ($(this).attr("id") == idModelo) {
                    $(this).attr("selected", "");
                }
            });*/
        }
    });
}

