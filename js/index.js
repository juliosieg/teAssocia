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
        $("#cpfAluno").removeAttr("disabled");

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

    var cpf = $("#cpfAluno").val().replace(/[^\d]+/g, '');

    if (cpf == "" || cpf == null) {
        swal("Opa!", "Informe um CPF para realizar a consulta", "info");
    } else {

        //Testar se é um CPF Válido
        if (validaCpf(cpf)) {

            $.ajax({
                type: "POST",
                url: 'funcoes/funcoesIndex.php',
                data: {funcao: "consultaCpf", consultaCpf: cpf},
                success: function (html) {

                    if (parseInt(html) > 0) {

                        swal("Erro", "CPF já cadastrado", "error");
                        $("#modalCadastro").modal('hide');

                    } else {
                        $(".dadosConsulta").slideDown(2000);
                        $("#cpfAluno").attr("disabled", "disabled");
                    }

                }
            });
        } else {
            swal("CPF Inválido", "O CPF que você informou não é válido.", "error");
        }
    }
}

function validaCpf(strCpf) {
    var soma;
    var resto;
    soma = 0;
    if (strCpf == "00000000000") {
        return false;
    }

    for (i = 1; i <= 9; i++) {
        soma = soma + parseInt(strCpf.substring(i - 1, i)) * (11 - i);
    }

    resto = soma % 11;

    if (resto == 10 || resto == 11 || resto < 2) {
        resto = 0;
    } else {
        resto = 11 - resto;
    }

    if (resto != parseInt(strCpf.substring(9, 10))) {
        return false;
    }

    soma = 0;

    for (i = 1; i <= 10; i++) {
        soma = soma + parseInt(strCpf.substring(i - 1, i)) * (12 - i);
    }
    resto = soma % 11;

    if (resto == 10 || resto == 11 || resto < 2) {
        resto = 0;
    } else {
        resto = 11 - resto;
    }

    if (resto != parseInt(strCpf.substring(10, 11))) {
        return false;
    }


    return true;

}

function abreModalCadastro() {
    $("#modalCadastro").modal('show');
}

function carregaEntidades() {
    $.ajax({
        type: "POST",
        url: 'funcoes/funcoesIndex.php',
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
        url: 'funcoes/funcoesIndex.php',
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
        url: 'funcoes/funcoesIndex.php',
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
            url: 'funcoes/funcoesIndex.php',
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
        url: 'funcoes/funcoesIndex.php',
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

function validaCadastro() {
    var rgAluno = $("#rgAluno").val();
    var nomeAluno = $("#nomeAluno").val();
    var cpfAluno = $("#cpfAluno").val();
    var enderecoAluno = $("#enderecoAluno").val();
    var ufAluno = $("#ufAluno").val();
    var cidadeAluno = $("#cidadeAluno").val();
    var bairroAluno = $("#bairroAluno").val();
    var cepAluno = $("#cepAluno").val();
    var telefoneAluno = $("#telefoneAluno").val();
    var celularAluno = $("#celularAluno").val();
    var emailAluno = $("#emailAluno").val();
    var cursoAluno = $("#cursoAluno").val();
    var semestreAluno = $("#semestreAluno").val();
    var paradaAluno = $("#paradaAluno").val();
    var entidadeAluno = $("#entidadeAluno").val();
    
    
}


