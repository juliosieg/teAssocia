$(document).ready(function () {

    $("#cpfAluno").mask("000.000.000-00");
    $("#telefoneAluno").mask("(00) 0000-0000");
    $("#rgAluno").mask("0000000000");
    $("#cepAluno").mask("00000-000");
    
    $("#btnCadastro").attr("disabled", "disabled");

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
        $("#senhaAluno").val("");
        $("#cpfAluno").removeAttr("disabled");

        $("#cidadeAluno").find('option').remove();
        $("#cidadeAluno").append("<option value=''>Selecione uma UF</option>");

        $("#rgAluno").removeClass("nao-preenchido");
        $("#nomeAluno").removeClass("nao-preenchido");
        $("#cpfAluno").removeClass("nao-preenchido");
        $("#enderecoAluno").removeClass("nao-preenchido");
        $("#ufAluno").removeClass("nao-preenchido");
        $("#cidadeAluno").removeClass("nao-preenchido");
        $("#bairroAluno").removeClass("nao-preenchido");
        $("#cepAluno").removeClass("nao-preenchido");
        $("#telefoneAluno").removeClass("nao-preenchido");
        $("#celularAluno").removeClass("nao-preenchido");
        $("#emailAluno").removeClass("nao-preenchido");
        $("#cursoAluno").removeClass("nao-preenchido");
        $("#semestreAluno").removeClass("nao-preenchido");
        $("#paradaAluno").removeClass("nao-preenchido");
        $("#entidadeAluno").removeClass("nao-preenchido");
        $("#senhaAluno").removeClass("nao-preenchido");

        carregaEntidades();
        carregaSemestres();
        carregaUfs();
        carregaParadas
        
        $("#numeros").html("<img src='images/error.png'/>");
        $("#letras").html("<img src='images/error.png'/>");
        $("#8caracteres").html("<img src='images/error.png'/>");

        $("#btnCadastro").attr("disabled", "disabled");

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
                $("#entidadeAluno").append("<option value=" + item.id + " campus=" + item.campus + " nome=" + item.nome + ">" + item.nome + " - " + item.campus + "</option>")
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
                $("#semestreAluno").append("<option value=" + item.id + " descricao=" + item.descricao + ">" + item.descricao + "</option>")
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
                $("#ufAluno").append("<option value=" + item.id + " nome=" + item.nome + " uf=" + item.uf + " regiao=" + item.regiao + ">" + item.uf + "</option>")
            });
        }
    });
}

function carregaCidades() {

    var idEstado = $("#ufAluno option:selected").val();

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
                    $("#cidadeAluno").append("<option value=" + item.id + " nome=" + item.nome + ">" + item.nome + "</option>");
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
                $("#paradaAluno").append("<option value=" + item.id + " descricao=" + item.descricao + ">" + item.descricao + "</option>");
            });
        }
    });
}

function validaCadastro() {

    $("#rgAluno").removeClass("nao-preenchido");
    $("#nomeAluno").removeClass("nao-preenchido");
    $("#cpfAluno").removeClass("nao-preenchido");
    $("#enderecoAluno").removeClass("nao-preenchido");
    $("#ufAluno").removeClass("nao-preenchido");
    $("#cidadeAluno").removeClass("nao-preenchido");
    $("#bairroAluno").removeClass("nao-preenchido");
    $("#cepAluno").removeClass("nao-preenchido");
    $("#telefoneAluno").removeClass("nao-preenchido");
    $("#celularAluno").removeClass("nao-preenchido");
    $("#emailAluno").removeClass("nao-preenchido");
    $("#cursoAluno").removeClass("nao-preenchido");
    $("#semestreAluno").removeClass("nao-preenchido");
    $("#paradaAluno").removeClass("nao-preenchido");
    $("#entidadeAluno").removeClass("nao-preenchido");
    $("#senhaAluno").removeClass("nao-preenchido");

    var rgAluno = $("#rgAluno").val().replace(/[^\d]+/g, '');
    ;
    var nomeAluno = $("#nomeAluno").val();
    var cpfAluno = $("#cpfAluno").val().replace(/[^\d]+/g, '');
    ;
    var enderecoAluno = $("#enderecoAluno").val();
    var ufAluno = $("#ufAluno").val();
    var cidadeAluno = $("#cidadeAluno").val();
    var bairroAluno = $("#bairroAluno").val();
    var cepAluno = $("#cepAluno").val().replace(/[^\d]+/g, '');
    ;
    var telefoneAluno = $("#telefoneAluno").val().replace(/[^\d]+/g, '');
    ;
    var celularAluno = $("#celularAluno").val().replace(/[^\d]+/g, '');
    ;
    var emailAluno = $("#emailAluno").val();
    var cursoAluno = $("#cursoAluno").val();
    var semestreAluno = $("#semestreAluno").val();
    var paradaAluno = $("#paradaAluno").val();
    var entidadeAluno = $("#entidadeAluno").val();
    var senhaAluno = $("#senhaAluno").val();

    if (rgAluno == null || rgAluno == "" ||
            nomeAluno == null || nomeAluno == "" ||
            cpfAluno == null || cpfAluno == "" ||
            enderecoAluno == null || enderecoAluno == "" ||
            ufAluno == null || ufAluno == "" ||
            cidadeAluno == null || cidadeAluno == "" ||
            bairroAluno == null || bairroAluno == "" ||
            cepAluno == null || cepAluno == "" ||
            telefoneAluno == null || telefoneAluno == "" ||
            celularAluno == null || celularAluno == "" ||
            emailAluno == null || emailAluno == "" ||
            cursoAluno == null || cursoAluno == "" ||
            semestreAluno == null || semestreAluno == "" ||
            paradaAluno == null || paradaAluno == "" ||
            entidadeAluno == null || entidadeAluno == "" ||
            senhaAluno == null || senhaAluno == "") {

        if (rgAluno == null || rgAluno == "") {
            $("#rgAluno").addClass("nao-preenchido");
        }

        if (nomeAluno == null || nomeAluno == "") {
            $("#nomeAluno").addClass("nao-preenchido");
        }

        if (cpfAluno == null || cpfAluno == "") {
            $("#cpfAluno").addClass("nao-preenchido");
        }

        if (enderecoAluno == null || enderecoAluno == "") {
            $("#enderecoAluno").addClass("nao-preenchido");
        }

        if (ufAluno == null || ufAluno == "") {
            $("#ufAluno").addClass("nao-preenchido");
        }

        if (cidadeAluno == null || cidadeAluno == "") {
            $("#cidadeAluno").addClass("nao-preenchido");
        }

        if (bairroAluno == null || bairroAluno == "") {
            $("#bairroAluno").addClass("nao-preenchido");
        }

        if (cepAluno == null || cepAluno == "") {
            $("#cepAluno").addClass("nao-preenchido");
        }

        if (telefoneAluno == null || telefoneAluno == "") {
            $("#telefoneAluno").addClass("nao-preenchido");
        }

        if (celularAluno == null || celularAluno == "") {
            $("#celularAluno").addClass("nao-preenchido");
        }

        if (emailAluno == null || emailAluno == "") {
            $("#emailAluno").addClass("nao-preenchido");
        }

        if (cursoAluno == null || cursoAluno == "") {
            $("#cursoAluno").addClass("nao-preenchido");
        }

        if (semestreAluno == null || semestreAluno == "") {
            $("#semestreAluno").addClass("nao-preenchido");
        }

        if (paradaAluno == null || paradaAluno == "") {
            $("#paradaAluno").addClass("nao-preenchido");
        }

        if (entidadeAluno == null || entidadeAluno == "") {
            $("#entidadeAluno").addClass("nao-preenchido");
        }

        if (senhaAluno == null || senhaAluno == "") {
            $("#senhaAluno").addClass("nao-preenchido");
        }

    } else {

        $.ajax({
            type: "POST",
            url: 'funcoes/funcoesIndex.php',
            data: {funcao: "cadastraAssociado", entidadeAluno: entidadeAluno, paradaAluno: paradaAluno,
                semestreAluno: semestreAluno, cursoAluno: cursoAluno, emailAluno: emailAluno, celularAluno: celularAluno,
                telefoneAluno: telefoneAluno, cepAluno: cepAluno, bairroAluno: bairroAluno, cidadeAluno: cidadeAluno,
                ufAluno: ufAluno, enderecoAluno: enderecoAluno, cpfAluno: cpfAluno, nomeAluno: nomeAluno, rgAluno: rgAluno, senhaAluno: senhaAluno},
            success: function (html) {
                var test = $.trim(html);

                if (test == "OK") {
                    swal({
                        title: "Tudo certo!",
                        text: "Seu cadastro foi realizado com sucesso.",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                        closeOnConfirm: false
                    },
                            function () {
                                swal("Dados de Acesso", "Assim que seu cadastro for aprovado pela Associação, você receberá um e-mail contendo informações sobre o acesso ao sistema da associação.", "info");
                            });

                    $("#modalCadastro").modal('hide');
                } else {
                    swal("Opa", "Ocorreu algum problema no seu cadastro, tente novamente mais tarde.", "error");
                    $("#modalCadastro").modal('hide');
                }

            }
        });

    }
}

function verificaSenha() {
    var senha = $("#senhaAluno").val();

    var numeros = false;
    var letras = false;
    var caracteres = false;

    if (senha.length >= 8) {
        $("#8caracteres").html("<img src='images/success.png'/>");
        caracteres = true;
    } else {
        $("#8caracteres").html("<img src='images/error.png'/>");
        caracteres = false;
    }

    if (senha.match(/[a-z]+/)) {
        $("#letras").html("<img src='images/success.png'/>");
        letras = true;
    } else {
        $("#letras").html("<img src='images/error.png'/>");
        letras = false
    }

    if (senha.match(/[0-9]+/)) {
        $("#numeros").html("<img src='images/success.png'/>");
        numeros = true;
    } else {
        $("#numeros").html("<img src='images/error.png'/>");
        numeros = false;
    }
    
    if(numeros == true && caracteres == true && letras == true){
        $("#btnCadastro").removeAttr("disabled");
    }else{
        $("#btnCadastro").attr("disabled", "disabled");
    }

}



