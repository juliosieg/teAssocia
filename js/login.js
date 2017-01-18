$(document).ready(function () {

    $("#cpfAluno").mask("000.000.000-00");
    $("#telefoneAluno").mask("(00) 0000-0000");
    $("#rgAluno").mask("0000000000");
    $("#cepAluno").mask("00000-000");

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
        $("#rgAluno").val("");
        $("#nomeAluno").val("");
        $("#cpfAluno").val("");
        $("#enderecoAluno").val("");
        $("#ufAluno").val("");
        $("#cidadeAluno").val("");
        $("#bairroAluno").val("");
        $("#cepAluno").val("");
        $("#telefoneAluno").val("");
        $("#celularAluno").val("");
        $("#emailAluno").val("");
        $("#cursoAluno").val("");
        $("#semestreAluno").val("");
        $("#paradaAluno").val("");
        $("#entidadeAluno").val("");

        $("#cidadeAluno").find('option').remove();
        $("#cidadeAluno").append("<option value=''>Selecione uma UF</option>");

        carregaEntidades();
        carregaSemestres();
        carregaUfs();
        carregaParadas();   

    });

    carregaEntidades();
    carregaSemestres();
    carregaUfs();
    carregaParadas();

});

function consultaCpf() {

    $(".dadosConsulta").slideDown(2000);

}

function abreModalCadastro() {
    $("#modalCadastro").modal('show');
}

function carregaEntidades() {
    $.ajax({
        type: "POST",
        url: 'funcoes/funcoesLogin.php',
        data: {funcao: "carregaEntidades"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            //Limpa todas as opções
            $("#entidadeAluno").find('option').remove();
            $("#entidadeAluno").append("<option value=''>Selecione um item</option>");

            $.each(test, function (i, item) {
                $("#entidadeAluno").append("<option id=" + item.id + " campus=" + item.campus + " nome=" + item.nome + ">" + item.nome + " - " + item.campus + "</option>")
            });


        }
    });
}

function carregaSemestres() {
    $.ajax({
        type: "POST",
        url: 'funcoes/funcoesLogin.php',
        data: {funcao: "carregaSemestres"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            //Limpa todas as opções
            $("#semestreAluno").find('option').remove();
            $("#semestreAluno").append("<option value=''>Selecione um item</option>");

            $.each(test, function (i, item) {
                $("#semestreAluno").append("<option id=" + item.id + " descricao=" + item.descricao + ">" + item.descricao + "</option>")
            });


        }
    });
}

function carregaUfs() {
    $.ajax({
        type: "POST",
        url: 'funcoes/funcoesLogin.php',
        data: {funcao: "carregaUfs"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            $("#ufAluno").find('option').remove();
            $("#ufAluno").append("<option value=''>Selecione uma UF</option>");

            $.each(test, function (i, item) {
                $("#ufAluno").append("<option id=" + item.id + " nome=" + item.nome + " uf=" + item.uf + " regiao=" + item.regiao + ">" + item.uf + "</option>")
            });
        }
    });
}

function carregaCidades() {

    var idEstado = $("#ufAluno option:selected").attr("id");

    if (idEstado == "" || idEstado == null) {
        $("#cidadeAluno").find('option').remove();
        $("#cidadeAluno").append("<option value=''>Selecione uma UF</option>");
    } else {

        $.ajax({
            type: "POST",
            url: 'funcoes/funcoesLogin.php',
            data: {funcao: "carregaCidades", idEstado: idEstado},
            success: function (html) {
                var test = jQuery.parseJSON(html);

                $("#cidadeAluno").find('option').remove();
                $("#cidadeAluno").append("<option value=''>Selecione um item</option>");

                $.each(test, function (i, item) {
                    $("#cidadeAluno").append("<option id=" + item.id + " nome=" + item.nome + ">" + item.nome + "</option>");
                });
            }
        });
    }
}

function carregaParadas() {
    $.ajax({
        type: "POST",
        url: 'funcoes/funcoesLogin.php',
        data: {funcao: "carregaParadas"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            //Limpa todas as opções
            $("#paradaAluno").find('option').remove();
            $("#paradaAluno").append("<option value=''>Selecione um item</option>");

            $.each(test, function (i, item) {
                $("#paradaAluno").append("<option id=" + item.id + " descricao=" + item.descricao + ">" + item.descricao + "</option>");
            });


        }
    });
}

