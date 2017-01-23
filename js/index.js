$(document).ready(function () {

    $("#cpfAluno").mask("000.000.000-00");
    $("#telefoneAluno").mask("(00) 0000-0000");
    $("#rgAluno").mask("0000000000");
    $("#tituloEleitorAluno").mask("000000000000");
    $("#zonaEleitoralAluno").mask("000");
    $("#secaoEleitoralAluno").mask("0000");
    $("#dtNascimento").mask("00/00/0000");
    $("#cepAluno").mask("00000-000");
    $('#dtNascimento').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR"
    });

    $(".btn-group > .btn").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
    });

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
        $("#cpfAluno").val("");
        $("#nomeAluno").val("");
        $("#dtNascimento").val("");
        $("#rgAluno").val("");
        $("#tituloEleitoralAluno").val("");
        $("#zonaEleitoralAluno").val("");
        $("#secaoEleitoralAluno").val("");
        $("#enderecoAluno").val("");
        $("#ufAluno").val("");
        $("#cidadeAluno").val("");
        $("#bairroAluno").val("");
        $("#cepAluno").val("");
        $("#telefoneAluno").val("");
        $("#celularAluno").val("");
        $("#emailAluno").val("");
        $("#cursoAluno").val("");
        $("#matriculaAluno").val("");
        $("#tipoSanguineoAluno").val("");
        $("#semestreAluno").val("");
        $("#paradaAluno").val("");
        $("#entidadeAluno").val("");
        $("#senhaAluno").val("");
        $("#comprovanteMatricula").fileinput('clear');
        $("#fotoAluno").fileinput('clear');
        $("#tituloEleitorFoto").fileinput('clear');
        $('.btn-group > .btn.active').removeClass('active');

        $("#cpfAluno").removeAttr("disabled");
        $("#cidadeAluno").find('option').remove();
        $("#cidadeAluno").append("<option value=''>Selecione uma UF</option>");

        carregaEntidades();
        carregaSemestres();
        carregaUfs();
        carregaParadas();

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

    var cpfAluno = $("#cpfAluno").val().replace(/[^\d]+/g, '');
    var nomeAluno = $("#nomeAluno").val();
    var dataNascimentoAluno = $("#dtNascimento").val();
    var rgAluno = $("#rgAluno").val().replace(/[^\d]+/g, '');
    var tituloEleitoralAluno = $("#tituloEleitorAluno").val();
    var zonaEleitoralAluno = $("#zonaEleitoralAluno").val();
    var secaoEleitoralAluno = $("#secaoEleitoralAluno").val();
    var enderecoAluno = $("#enderecoAluno").val();
    var ufAluno = $("#ufAluno").val();
    var cidadeAluno = $("#cidadeAluno").val();
    var bairroAluno = $("#bairroAluno").val();
    var cepAluno = $("#cepAluno").val().replace(/[^\d]+/g, '');
    var telefoneAluno = $("#telefoneAluno").val().replace(/[^\d]+/g, '');
    var celularAluno = $("#celularAluno").val().replace(/[^\d]+/g, '');
    var emailAluno = $("#emailAluno").val();
    var cursoAluno = $("#cursoAluno").val();
    var matriculaAluno = $("#matriculaAluno").val();
    var tipoSanguineoAluno = $("#tipoSanguineoAluno").val();
    var semestreAluno = $("#semestreAluno").val();
    var paradaAluno = $("#paradaAluno").val();
    var entidadeAluno = $("#entidadeAluno").val();
    var melhorDiaPagamento = $('.btn-group > .btn.active').text();
    var senhaAluno = $("#senhaAluno").val();

    if (nomeAluno == null || nomeAluno == "" ||
            dataNascimentoAluno == null || dataNascimentoAluno == "" ||
            rgAluno == null || rgAluno == "" ||
            tituloEleitoralAluno == null || tituloEleitoralAluno == "" ||
            zonaEleitoralAluno == null || zonaEleitoralAluno == "" ||
            secaoEleitoralAluno == null || secaoEleitoralAluno == "" ||
            enderecoAluno == null || enderecoAluno == "" ||
            ufAluno == null || ufAluno == "" ||
            cidadeAluno == null || cidadeAluno == "" ||
            bairroAluno == null || bairroAluno == "" ||
            cepAluno == null || cepAluno == "" ||
            celularAluno == null || celularAluno == "" ||
            emailAluno == null || emailAluno == "" ||
            cursoAluno == null || cursoAluno == "" ||
            tipoSanguineoAluno == null || tipoSanguineoAluno == "" ||
            semestreAluno == null || semestreAluno == "" ||
            paradaAluno == null || paradaAluno == "" ||
            entidadeAluno == null || entidadeAluno == "" ||
            melhorDiaPagamento == null || melhorDiaPagamento == "" ||
            senhaAluno == null || senhaAluno == "" ||
            document.getElementById("comprovanteMatricula").files.length == 0 ||
            document.getElementById("tituloEleitorFoto").files.length == 0) {

        swal("Opa", "Campos obrigatórios não preenchidos!", "error");

        return false;

    } else {

        //Tratamento dos horarios
        if ($("#fevSeg").is(":checked")) {
            var segFev = 1;
        } else {
            var segFev = 0;
        }

        if ($("#fevTer").is(":checked")) {
            var terFev = 1;
        } else {
            var terFev = 0;
        }


        if ($("#fevQua").is(":checked")) {
            var quaFev = 1;
        } else {
            var quaFev = 0;
        }


        if ($("#fevQui").is(":checked")) {
            var quiFev = 1;
        } else {
            var quiFev = 0;
        }
        if ($("#fevSex").is(":checked")) {
            var sexFev = 1;
        } else {
            var sexFev = 0;
        }
        if ($("#fevSab").is(":checked")) {
            var sabFev = 1;
        } else {
            var sabFev = 0;
        }

        if ($("#marSeg").is(":checked")) {
            var segMar = 1;
        } else {
            var segMar = 0;
        }

        if ($("#marTer").is(":checked")) {
            var terMar = 1;
        } else {
            var terMar = 0;
        }


        if ($("#marQua").is(":checked")) {
            var quaMar = 1;
        } else {
            var quaMar = 0;
        }


        if ($("#marQui").is(":checked")) {
            var quiMar = 1;
        } else {
            var quiMar = 0;
        }
        if ($("#marSex").is(":checked")) {
            var sexMar = 1;
        } else {
            var sexMar = 0;
        }
        if ($("#marSab").is(":checked")) {
            var sabMar = 1;
        } else {
            var sabMar = 0;
        }

        if ($("#abrSeg").is(":checked")) {
            var segAbr = 1;
        } else {
            var segAbr = 0;
        }
        if ($("#abrTer").is(":checked")) {
            var terAbr = 1;
        } else {
            var terAbr = 0;
        }
        if ($("#abrQua").is(":checked")) {
            var quaAbr = 1;
        } else {
            var quaAbr = 0;
        }
        if ($("#abrQui").is(":checked")) {
            var quiAbr = 1;
        } else {
            var quiAbr = 0;
        }
        if ($("#abrSex").is(":checked")) {
            var sexAbr = 1;
        } else {
            var sexAbr = 0;
        }
        if ($("#abrSab").is(":checked")) {
            var sabAbr = 1;
        } else {
            var sabAbr = 0;
        }

        if ($("#maiSeg").is(":checked")) {
            var segMai = 1;
        } else {
            var segMai = 0;
        }
        if ($("#maiTer").is(":checked")) {
            var terMai = 1;
        } else {
            var terMai = 0;
        }
        if ($("#maiQua").is(":checked")) {
            var quaMai = 1;
        } else {
            var quaMai = 0;
        }
        if ($("#maiQui").is(":checked")) {
            var quiMai = 1;
        } else {
            var quiMai = 0;
        }
        if ($("#maiSex").is(":checked")) {
            var sexMai = 1;
        } else {
            var sexMai = 0;
        }
        if ($("#maiSab").is(":checked")) {
            var sabMai = 1;
        } else {
            var sabMai = 0;
        }

        if ($("#junSeg").is(":checked")) {
            var segJun = 1;
        } else {
            var segJun = 0;
        }
        if ($("#junTer").is(":checked")) {
            var terJun = 1;
        } else {
            var terJun = 0;
        }
        if ($("#junQua").is(":checked")) {
            var quaJun = 1;
        } else {
            var quaJun = 0;
        }
        if ($("#junQui").is(":checked")) {
            var quiJun = 1;
        } else {
            var quiJun = 0;
        }
        if ($("#junSex").is(":checked")) {
            var sexJun = 1;
        } else {
            var sexJun = 0;
        }
        if ($("#junSab").is(":checked")) {
            var sabJun = 1;
        } else {
            var sabJun = 0;
        }

        if ($("#julSeg").is(":checked")) {
            var segJul = 1;
        } else {
            var segJul = 0;
        }

        if ($("#julTer").is(":checked")) {
            var terJul = 1;
        } else {
            var terJul = 0;
        }

        if ($("#julQua").is(":checked")) {
            var quaJul = 1;
        } else {
            var quaJul = 0;
        }

        if ($("#julQui").is(":checked")) {
            var quiJul = 1;
        } else {
            var quiJul = 0;
        }

        if ($("#julSex").is(":checked")) {
            var sexJul = 1;
        } else {
            var sexJul = 0;
        }

        if ($("#julSab").is(":checked")) {
            var sabJul = 1;
        } else {
            var sabJul = 0;
        }
        /***********************************************/

        var fd = new FormData(document.getElementById("formAluno"));

        fd.append("cpfAluno", cpfAluno);
        fd.append("nomeAluno", nomeAluno);
        fd.append("dataNascimentoAluno", dataNascimentoAluno);
        fd.append("rgAluno", rgAluno);
        fd.append("tituloEleitoralAluno", tituloEleitoralAluno);
        fd.append("ufAluno", ufAluno);
        fd.append("enderecoAluno", enderecoAluno);
        fd.append("secaoEleitoralAluno", secaoEleitoralAluno);
        fd.append("zonaEleitoralAluno", zonaEleitoralAluno);
        fd.append("senhaAluno", senhaAluno);
        fd.append("melhorDiaPagamento", melhorDiaPagamento);
        fd.append("entidadeAluno", entidadeAluno);
        fd.append("paradaAluno", paradaAluno);
        fd.append("semestreAluno", semestreAluno);
        fd.append("tipoSanguineoAluno", tipoSanguineoAluno);
        fd.append("matriculaAluno", matriculaAluno);
        fd.append("cursoAluno", cursoAluno);
        fd.append("emailAluno", emailAluno);
        fd.append("celularAluno", celularAluno);
        fd.append("telefoneAluno", telefoneAluno);
        fd.append("cepAluno", cepAluno);
        fd.append("bairroAluno", bairroAluno);
        fd.append("cidadeAluno", cidadeAluno);

        fd.append("segFev", segFev);
        fd.append("terFev", terFev);
        fd.append("quaFev", quaFev);
        fd.append("quiFev", quiFev);
        fd.append("sexFev", sexFev);
        fd.append("sabFev", sabFev);
        fd.append("segMar", segMar);
        fd.append("terMar", terMar);
        fd.append("quaMar", quaMar);
        fd.append("quiMar", quiMar);
        fd.append("sexMar", sexMar);
        fd.append("sabMar", sabMar);
        fd.append("segAbr", segAbr);
        fd.append("terAbr", terAbr);
        fd.append("quaAbr", quaAbr);
        fd.append("quiAbr", quiAbr);
        fd.append("sexAbr", sexAbr);
        fd.append("sabAbr", sabAbr);
        fd.append("segMai", segMai);
        fd.append("terMai", terMai);
        fd.append("quaMai", quaMai);
        fd.append("quiMai", quiMai);
        fd.append("sexMai", sexMai);
        fd.append("sabMai", sabMai);
        fd.append("segJun", segJun);
        fd.append("terJun", terJun);
        fd.append("quaJun", quaJun);
        fd.append("quiJun", quiJun);
        fd.append("sexJun", sexJun);
        fd.append("sabJun", sabJun);
        fd.append("segJul", segJul);
        fd.append("terJul", terJul);
        fd.append("quaJul", quaJul);
        fd.append("quiJul", quiJul);
        fd.append("sexJul", sexJul);
        fd.append("sabJul", sabJul);

        fd.append('funcao', 'cadastraAssociado');

        $.ajax({
            type: "POST",
            url: 'funcoes/funcoesIndex.php',
            data: fd,
            processData: false,
            contentType: false,
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
                    swal("Opa", test, "error");
                    //$("#modalCadastro").modal('hide');
                    return false;
                }

            }
        });
    }

    return false;
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

    if (numeros == true && caracteres == true && letras == true) {
        $("#btnCadastro").removeAttr("disabled");
    } else {
        $("#btnCadastro").attr("disabled", "disabled");
    }

}

function tratamentoTodosSegunda() {
    if ($("#tdsSeg").is(":checked")) {
        $("#fevSeg").attr("disabled", "disabled");
        $("#fevSeg").attr("checked", "checked");
        $("#marSeg").attr("disabled", "disabled");
        $("#marSeg").attr("checked", "checked");
        $("#abrSeg").attr("disabled", "disabled");
        $("#abrSeg").attr("checked", "checked");
        $("#maiSeg").attr("disabled", "disabled");
        $("#maiSeg").attr("checked", "checked");
        $("#junSeg").attr("disabled", "disabled");
        $("#junSeg").attr("checked", "checked");
        $("#julSeg").attr("disabled", "disabled");
        $("#julSeg").attr("checked", "checked");
    } else {
        $("#fevSeg").removeAttr("disabled");
        $("#fevSeg").removeAttr("checked");
        $("#marSeg").removeAttr("disabled");
        $("#marSeg").removeAttr("checked");
        $("#abrSeg").removeAttr("disabled");
        $("#abrSeg").removeAttr("checked");
        $("#maiSeg").removeAttr("disabled");
        $("#maiSeg").removeAttr("checked");
        $("#junSeg").removeAttr("disabled");
        $("#junSeg").removeAttr("checked");
        $("#julSeg").removeAttr("disabled");
        $("#julSeg").removeAttr("checked");
    }
}

function tratamentoTodosTerca() {
    if ($("#tdsTer").is(":checked")) {
        $("#fevTer").attr("disabled", "disabled");
        $("#fevTer").attr("checked", "checked");
        $("#marTer").attr("disabled", "disabled");
        $("#marTer").attr("checked", "checked");
        $("#abrTer").attr("disabled", "disabled");
        $("#abrTer").attr("checked", "checked");
        $("#maiTer").attr("disabled", "disabled");
        $("#maiTer").attr("checked", "checked");
        $("#junTer").attr("disabled", "disabled");
        $("#junTer").attr("checked", "checked");
        $("#julTer").attr("disabled", "disabled");
        $("#julTer").attr("checked", "checked");
    } else {
        $("#fevTer").removeAttr("disabled");
        $("#fevTer").removeAttr("checked");
        $("#marTer").removeAttr("disabled");
        $("#marTer").removeAttr("checked");
        $("#abrTer").removeAttr("disabled");
        $("#abrTer").removeAttr("checked");
        $("#maiTer").removeAttr("disabled");
        $("#maiTer").removeAttr("checked");
        $("#junTer").removeAttr("disabled");
        $("#junTer").removeAttr("checked");
        $("#julTer").removeAttr("disabled");
        $("#julTer").removeAttr("checked");
    }
}

function tratamentoTodosQuarta() {
    if ($("#tdsQua").is(":checked")) {
        $("#fevQua").attr("disabled", "disabled");
        $("#fevQua").attr("checked", "checked");
        $("#marQua").attr("disabled", "disabled");
        $("#marQua").attr("checked", "checked");
        $("#abrQua").attr("disabled", "disabled");
        $("#abrQua").attr("checked", "checked");
        $("#maiQua").attr("disabled", "disabled");
        $("#maiQua").attr("checked", "checked");
        $("#junQua").attr("disabled", "disabled");
        $("#junQua").attr("checked", "checked");
        $("#julQua").attr("disabled", "disabled");
        $("#julQua").attr("checked", "checked");
    } else {
        $("#fevQua").removeAttr("disabled");
        $("#fevQua").removeAttr("checked");
        $("#marQua").removeAttr("disabled");
        $("#marQua").removeAttr("checked");
        $("#abrQua").removeAttr("disabled");
        $("#abrQua").removeAttr("checked");
        $("#maiQua").removeAttr("disabled");
        $("#maiQua").removeAttr("checked");
        $("#junQua").removeAttr("disabled");
        $("#junQua").removeAttr("checked");
        $("#julQua").removeAttr("disabled");
        $("#julQua").removeAttr("checked");
    }
}

function tratamentoTodosQuinta() {
    if ($("#tdsQui").is(":checked")) {
        $("#fevQui").attr("disabled", "disabled");
        $("#fevQui").attr("checked", "checked");
        $("#marQui").attr("disabled", "disabled");
        $("#marQui").attr("checked", "checked");
        $("#abrQui").attr("disabled", "disabled");
        $("#abrQui").attr("checked", "checked");
        $("#maiQui").attr("disabled", "disabled");
        $("#maiQui").attr("checked", "checked");
        $("#junQui").attr("disabled", "disabled");
        $("#junQui").attr("checked", "checked");
        $("#julQui").attr("disabled", "disabled");
        $("#julQui").attr("checked", "checked");
    } else {
        $("#fevQui").removeAttr("disabled");
        $("#fevQui").removeAttr("checked");
        $("#marQui").removeAttr("disabled");
        $("#marQui").removeAttr("checked");
        $("#abrQui").removeAttr("disabled");
        $("#abrQui").removeAttr("checked");
        $("#maiQui").removeAttr("disabled");
        $("#maiQui").removeAttr("checked");
        $("#junQui").removeAttr("disabled");
        $("#junQui").removeAttr("checked");
        $("#julQui").removeAttr("disabled");
        $("#julQui").removeAttr("checked");
    }
}

function tratamentoTodosSexta() {
    if ($("#tdsSex").is(":checked")) {
        $("#fevSex").attr("disabled", "disabled");
        $("#fevSex").attr("checked", "checked");
        $("#marSex").attr("disabled", "disabled");
        $("#marSex").attr("checked", "checked");
        $("#abrSex").attr("disabled", "disabled");
        $("#abrSex").attr("checked", "checked");
        $("#maiSex").attr("disabled", "disabled");
        $("#maiSex").attr("checked", "checked");
        $("#junSex").attr("disabled", "disabled");
        $("#junSex").attr("checked", "checked");
        $("#julSex").attr("disabled", "disabled");
        $("#julSex").attr("checked", "checked");
    } else {
        $("#fevSex").removeAttr("disabled");
        $("#fevSex").removeAttr("checked");
        $("#marSex").removeAttr("disabled");
        $("#marSex").removeAttr("checked");
        $("#abrSex").removeAttr("disabled");
        $("#abrSex").removeAttr("checked");
        $("#maiSex").removeAttr("disabled");
        $("#maiSex").removeAttr("checked");
        $("#junSex").removeAttr("disabled");
        $("#junSex").removeAttr("checked");
        $("#julSex").removeAttr("disabled");
        $("#julSex").removeAttr("checked");
    }
}

function tratamentoTodosSabado() {
    if ($("#tdsSab").is(":checked")) {
        $("#fevSab").attr("disabled", "disabled");
        $("#fevSab").attr("checked", "checked");
        $("#marSab").attr("disabled", "disabled");
        $("#marSab").attr("checked", "checked");
        $("#abrSab").attr("disabled", "disabled");
        $("#abrSab").attr("checked", "checked");
        $("#maiSab").attr("disabled", "disabled");
        $("#maiSab").attr("checked", "checked");
        $("#junSab").attr("disabled", "disabled");
        $("#junSab").attr("checked", "checked");
        $("#julSab").attr("disabled", "disabled");
        $("#julSab").attr("checked", "checked");
    } else {
        $("#fevSab").removeAttr("disabled");
        $("#fevSab").removeAttr("checked");
        $("#marSab").removeAttr("disabled");
        $("#marSab").removeAttr("checked");
        $("#abrSab").removeAttr("disabled");
        $("#abrSab").removeAttr("checked");
        $("#maiSab").removeAttr("disabled");
        $("#maiSab").removeAttr("checked");
        $("#junSab").removeAttr("disabled");
        $("#junSab").removeAttr("checked");
        $("#julSab").removeAttr("disabled");
        $("#julSab").removeAttr("checked");
    }
}


