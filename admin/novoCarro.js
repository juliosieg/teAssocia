$(document).ready(function () {

    buscaFuncoes();

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $("#preco").maskMoney({prefix: 'R$ ', allowNegative: false, thousands: '.', decimal: ',', affixesStay: true});

    buscaOpcionais();

    $("#observacaoCarro").Editor();

    $("#modeloCarro").select2();
    buscaModelosInsercao();

    $("#tipoCarro").select2();
    buscaTiposInsercao();

});

function buscaModelosInsercao() {
    $.ajax({
        type: "POST",
        url: '../funcoes/funcoesCarros.php',
        data: {funcao: "getTodosModelos"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            $('#modeloCarro').find('option').remove();

            $("#modeloCarro").append("<option value=''>Selecione</option>");

            $.each(test, function (i, item) {
                $("#modeloCarro").append("<option id=" + item.id + " descricao=" + item.descmodelo + ">" + item.descmodelo + "</option>")
            });
        }
    });
}

function buscaTiposInsercao() {
    $.ajax({
        type: "POST",
        url: '../funcoes/funcoesCarros.php',
        data: {funcao: "getTodosTipos"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            $('#tipoCarro').find('option').remove();

            $("#tipoCarro").append("<option value=''>Selecione</option>");

            $.each(test, function (i, item) {
                $("#tipoCarro").append("<option id=" + item.id + " descricao=" + item.descricao + ">" + item.descricao + "</option>")
            });

        }
    });
}

function buscaOpcionais() {
    $.ajax({
        type: "POST",
        url: '../funcoes/funcoesCarros.php',
        data: {funcao: "getTodosOpcionais"},
        success: function (html) {
            var test = jQuery.parseJSON(html);
            $.each(test, function (i, item) {
                $("#opcionaisCarros").append("<label class='checkbox-inline'><input type='checkbox' value='" + item.id + "'> " + item.descricao + "</label>");

            });

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                increaseArea: '20%' // optional
            });
        }
    });
}

function limpaCamposCarros() {
    $("#descricaoCarro").val("");
    $("#quilometragemCarro").val("");
    $("#tipoCombustivelCarro").val("");
    $("#corCarro").val("");
    $("#anoFabricacao").val("");
    $("#anoModelo").val("");
    $("#versaoCarro").val("");
    $("#preco").val("");
    $('#fotoPrincipal').fileinput('clear');
    $('#fotoAdicional1').fileinput('clear');
    $('#fotoAdicional2').fileinput('clear');
    $('#fotoAdicional3').fileinput('clear');
    $("#observacaoCarro").Editor("setText", "");

    $("#tipoCarro").empty();
    $("#modeloCarro").empty();
    buscaModelosInsercao();
    buscaTiposInsercao();

    $("input[type='checkbox']").each(function () {
        if ($(this).prop('checked')) {
            $(this).iCheck('uncheck');
        }
        ;
    });


}

function inserirNovoCarro() {

    var descricao = $("#descricaoCarro").val();
    var quilometragem = $("#quilometragemCarro").val();
    var tipoCombustivel = $("#tipoCombustivelCarro").val();
    var cor = $("#corCarro").val();
    var anoModelo = $("#anoModelo").val();
    var anoFabricacao = $("#anoFabricacao").val();
    var modeloCarro = $('option:selected', $("#modeloCarro")).attr('id');
    var tipoCarro = $('option:selected', $("#tipoCarro")).attr('id')
    var versaoCarro = $("#versaoCarro").val();
    var preco = $("#preco").val();

    if ($("#observacaoCarro").val() != null || $("#observacaoCarro").val() != "") {
        var observacaoCarro = $("#observacaoCarro").Editor("getText");
    }

    if ((descricao == null || descricao == "") || (quilometragem == null || quilometragem == "") ||
            (tipoCombustivel == null || tipoCombustivel == "") || (cor == null || cor == "") || (preco == null || preco == "") ||
            (anoModelo == null || anoModelo == "") || (anoFabricacao == null || anoFabricacao == "") ||
            (modeloCarro == null || modeloCarro == "") || (tipoCarro == null || tipoCarro == "") ||
            (versaoCarro == null || versaoCarro == "") || document.getElementById("fotoPrincipal").files.length == 0 ||
            document.getElementById("fotoAdicional1").files.length == 0 ||
            document.getElementById("fotoAdicional2").files.length == 0 ||
            document.getElementById("fotoAdicional3").files.length == 0) {
        $.notify({
            // options
            message: 'Campos obrigatórios não preenchidos'
        }, {
            // settings
            type: 'danger'
        });

        return false;
    } else {

        preco = preco.replace("R$ ", "");
        preco = preco.replace(".", "");
        preco = preco.replace(",", ".");
        preco = parseFloat(preco);

        var fd = new FormData(document.getElementById("formNovoCarro"));
        fd.append('descricao', descricao);
        fd.append('quilometragem', quilometragem);
        fd.append('tipoCombustivel', tipoCombustivel);
        fd.append('cor', cor);
        fd.append('anoModelo', anoModelo);
        fd.append('anoFabricacao', anoFabricacao);
        fd.append('modeloCarro', modeloCarro);
        fd.append('tipoCarro', tipoCarro);
        fd.append('versaoCarro', versaoCarro);
        fd.append('preco', preco);
        fd.append('observacaoCarro', observacaoCarro);
        fd.append('funcao', 'inserir');

        bloqueiaMsgAguarde("body", true, "win8_linear");

        $.ajax({
            type: "POST",
            url: '../funcoes/funcoesCarros.php',
            data: fd,
            processData: false,
            contentType: false,
            success: function (data) {
                var test = $.trim(data);
                if (test == 'OK') {
                    $.notify({
                        // options
                        message: 'Carro inserido com sucesso'
                    }, {
                        // settings
                        type: 'success'
                    });

                    bloqueiaMsgAguarde("body", false, "win8_linear");

                    inserirOpcionaisCarro();

                } else {
                    $.notify({
                        // options
                        message: 'Erro na inserção!'
                    }, {
                        // settings
                        type: 'danger'
                    });

                    bloqueiaMsgAguarde("body", false, "win8_linear");
                }
            }
        }
        );
        //limpaCamposDestaque();
        return false;
    }
    return false;
}

function inserirOpcionaisCarro() {

    var opcionais = [];

    $("input[type='checkbox']").each(function () {
        if ($(this).prop('checked')) {

            opcionais.push($(this).val())

        }
        ;

    });

    $.ajax({
        type: "POST",
        url: '../funcoes/funcoesCarros.php',
        data: {funcao: "inserirOpcionais", opcionais: opcionais}
    });

    limpaCamposCarros();
}

function buscaFuncoes() {
    $.ajax({
        type: "GET",
        url: '../funcoes/controlaFuncoes.php',
        async: false,
        success: function (data) {
            var test = jQuery.parseJSON(data);
            funcoesPagina(test);
        }
    });
}

function funcoesPagina(test) {

    //Funções da página: 7 - Ver, 8 - Inserir

    var tem7 = false;
    var tem8 = false;

    $.each(test, function (i, item) {
        if (item == "7") {
            tem7 = true;
        }
        if (item == "8") {
            tem8 = true;
        }

    });

    if (tem7 == false) {
        bloqueia('.content-wrapper', true, 'img');
    }

    if (tem8 == false) {
        $("#btnInserir").attr("disabled", "disabled");
    }
}