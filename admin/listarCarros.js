$(document).ready(function () {
    getTodos();

    $("#observacoesEditarCarro").Editor();

    $("#erroAlteracaoDadosVazios").hide();

    $("#precoEditarCarro").maskMoney({prefix: 'R$ ', allowNegative: false, thousands: '.', decimal: ',', affixesStay: true});

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        increaseArea: '20%' // optional
    });

    //Para que mensagem abra mais do que uma vez, se fechada
    $(function () {
        $(document).on('click', '.alert-close', function () {
            $(this).parent().hide();
        })
    });
});

function getTodos() {

    $('#tableCarros').DataTable({
        "ajax": {"url": "../funcoes/funcoesCarros.php", data: {"funcao": "getTodos"}, "type": "POST"},
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "pageLength": 5,
        "responsive": true,
        "lengthMenu": [5, 10, 25, 50, 75, 100],
        dom: 'Bfrtip',
        buttons: [
            'colvis',
            'pageLength',
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ], language: {
            buttons: {
                colvis: 'Visibilidade',
                pageLength: {
                    _: "Mostrar %d elementos",
                    1: "Mostrar elemento"
                },
                copy: 'Copiar',
                copyTitle: 'Copiar',
                copyKeys: 'Pressione <i> Ctrl </ i> ou <i> \ u2318 </ i> + <i> C </ i> para copiar os dados da tabela para o clipboard. <br> Para cancelar, clique sobre esta mensagem ou pressione a tecla Esc.',
                copySuccess: {
                    _: '%d linhas copiadas',
                    1: '1 linha copiada'
                }
            }
        }

    });
}

function visualizarImagem(caminho) {
    var newwin = window.open('', 'miniwin', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,width=800,height=600,top=20%,left=20%');
    newwin.document.write('<html><head><title>Preview do Carro</title></head>');
    newwin.document.write('<body>');
    newwin.document.write('<img src=' + caminho + '>');
    newwin.document.write('</body></html>');
    newwin.document.close();
}

function excluir(codigo) {
    bootbox.confirm({
        title: 'Exclusão',
        message: 'Tem certeza que deseja excluir o carro de código ' + codigo + '?',
        buttons: {
            'cancel': {
                label: 'Cancelar',
                className: 'btn-default pull-left'
            },
            'confirm': {
                label: 'Excluir',
                className: 'btn-danger pull-right'
            }
        },
        callback: function (result) {
            if (result) {

                bloqueiaMsgAguarde("body", true, "win8_linear");

                $.ajax({
                    type: "POST",
                    url: '../funcoes/funcoesCarros.php',
                    data: {funcao: "excluir", codigo: codigo},
                    success: function (data) {
                        var test = $.trim(data);
                        if (test == 'OK') {
                            var table = $("#tableCarros").DataTable();
                            table.ajax.reload(null, false);

                            $.notify({
                                // options
                                message: 'Exclusão executada com sucesso'
                            }, {
                                // settings
                                type: 'success'
                            });

                            bloqueiaMsgAguarde("body", false, "win8_linear");

                        } else {
                            $.notify({
                                // options
                                message: 'Erro na exclusão ou carro não pode ser excluído.'
                            }, {
                                // settings
                                type: 'danger'
                            });

                            bloqueiaMsgAguarde("body", false, "win8_linear");

                        }

                    }
                });
            }
        }
    });
}

function alterar(codigo) {
    $("#modalEditarCarro").modal('show');

    $('#idEditarCarro').attr('disabled', 'true');
    $('#idEditarCarro').val(codigo);

    pesquisaCodigo(codigo);
}

function pesquisaCodigo(codigo) {
    $.ajax({
        type: "POST",
        url: '../funcoes/funcoesCarros.php',
        data: {funcao: "pesquisaCodigo", codigo: codigo},
        success: function (data) {
            var test = JSON.parse(data);

            $('#corEditarCarro').val(test[0].cor);
            $('#anoModeloEditarCarro').val(test[0].ano_modelo);
            $('#anoFabricacaoEditarCarro').val(test[0].ano_fabricacao);
            $('#precoEditarCarro').val(test[0].preco);
            $('#quilometragemEditarCarro').val(test[0].quilometragem);
            $('#versaoEditarCarro').val(test[0].versao);

            $('#tipoCombustivelEditarCarro').val(test[0].combustivel);

            buscaTiposEditarCarro(test[0].id_tipo);
            buscaModelosEditarCarro(test[0].id_modelo);

            buscaOpcionais(test[0].id);

            $("#observacoesEditarCarro").Editor("setText", test[0].observacoes);
        }
    });
}

function buscaTiposEditarCarro(idTipo) {
    $.ajax({
        type: "POST",
        url: '../funcoes/funcoesCarros.php',
        data: {funcao: "getTodosTipos"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            $('#tipoEditarCarro').find('option').remove();

            $("#tipoEditarCarro").append("<option value=''>Selecione</option>");

            $.each(test, function (i, item) {
                $("#tipoEditarCarro").append("<option id=" + item.id + " descricao=" + item.descricao + ">" + item.descricao + "</option>")
            });

            $("#tipoEditarCarro option").each(function ()
            {
                if ($(this).attr("id") == idTipo) {
                    $(this).attr("selected", "");
                }
            });

        }
    });
}

function buscaModelosEditarCarro(idModelo) {
    $.ajax({
        type: "POST",
        url: '../funcoes/funcoesCarros.php',
        data: {funcao: "getTodosModelos"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            $('#modeloEditarCarro').find('option').remove();

            $("#modeloEditarCarro").append("<option value=''>Selecione</option>");

            $.each(test, function (i, item) {
                $("#modeloEditarCarro").append("<option id=" + item.id + " descricao=" + item.descmodelo + ">" + item.descmodelo + "</option>")
            });

            $("#modeloEditarCarro option").each(function ()
            {
                if ($(this).attr("id") == idModelo) {
                    $(this).attr("selected", "");
                }
            });
        }
    });
}

function buscaOpcionais(codigo) {
    $("#opcionaisCarros").empty();

    $.ajax({
        type: "POST",
        url: '../funcoes/funcoesCarros.php',
        data: {funcao: "getTodosOpcionais"},
        success: function (html) {
            var test = jQuery.parseJSON(html);

            $.each(test, function (i, item) {
                $("#opcionaisCarros").append("<label class='checkbox-inline'><input type='checkbox' value='" + item.id + "'> " + item.descricao + "</label>");

            });

            $('#opcionaisCarros input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                increaseArea: '20%' // optional
            });
        }
    }).complete(function () {
        $.ajax({
            type: "POST",
            url: '../funcoes/funcoesCarros.php',
            data: {funcao: "buscaOpcionaisCodigo", codigo: codigo},
            success: function (html) {
                var test = jQuery.parseJSON(html);

                $("#opcionaisCarros input").each(function (index, value) {
                    var opcional = $(this).val();

                    $.each(test, function (i, item) {
                        if (item.id == opcional) {
                            $("#opcionaisCarros input").eq(index).attr("checked", "");
                        }

                    });
                })

                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    increaseArea: '20%' // optional
                });
            }
        });
    });


}

function salvarAlteracoes() {

    var codigoEditarCarro = $('#idEditarCarro').val();
    var observacoesEditarCarro = $('#observacoesEditarCarro').Editor("getText");
    var quilometragemEditarCarro = $('#quilometragemEditarCarro').val();
    var tipoCombustivelEditarCarro = $("#tipoCombustivelEditarCarro").val();
    var modeloEditarCarro = $('option:selected', $("#modeloEditarCarro")).attr('id');
    var tipoEditarCarro = $('option:selected', $("#tipoEditarCarro")).attr('id');
    var corEditarCarro = $('#corEditarCarro').val();
    var anoFabricacaoEditarCarro = $('#anoFabricacaoEditarCarro').val();
    var anoModeloEditarCarro = $('#anoModeloEditarCarro').val();
    var precoEditarCarro = $('#precoEditarCarro').val();
    var versaoEditarCarro = $('#versaoEditarCarro').val();

    var opcionais = [];
    $("input[type='checkbox']").each(function () {
        if ($(this).prop('checked')) {
            opcionais.push($(this).val())
        }
        ;
    });

    if (quilometragemEditarCarro != null && quilometragemEditarCarro != "" &&
            tipoCombustivelEditarCarro != null && tipoCombustivelEditarCarro != "" &&
            modeloEditarCarro != null && modeloEditarCarro != "" &&
            tipoEditarCarro != null && tipoEditarCarro != "" &&
            corEditarCarro != null && corEditarCarro != "" &&
            anoFabricacaoEditarCarro != null && anoFabricacaoEditarCarro != "" &&
            anoModeloEditarCarro != null && anoModeloEditarCarro != "" &&
            precoEditarCarro != null && precoEditarCarro != "" &&
            versaoEditarCarro != null && versaoEditarCarro != ""
            ) {
        
        precoEditarCarro = precoEditarCarro.replace("R$ ", "");
        precoEditarCarro = precoEditarCarro.replace(".", "");
        precoEditarCarro = precoEditarCarro.replace(",", ".");
        precoEditarCarro = parseFloat(precoEditarCarro);

        bloqueiaMsgAguarde("body", true, "win8_linear");

        $.ajax({
            type: "POST",
            url: '../funcoes/funcoesCarros.php',
            data: {funcao: "salvarAlteracoes", codigoEditar: codigoEditarCarro,
                quilometragemEditarCarro: quilometragemEditarCarro, tipoCombustivelEditarCarro: tipoCombustivelEditarCarro,
                modeloEditarCarro: modeloEditarCarro, tipoEditarCarro: tipoEditarCarro, corEditarCarro: corEditarCarro,
                anoFabricacaoEditarCarro: anoFabricacaoEditarCarro, anoModeloEditarCarro: anoModeloEditarCarro,
                precoEditarCarro: precoEditarCarro, versaoEditarCarro: versaoEditarCarro, observacoesEditarCarro: observacoesEditarCarro, opcionaisEditar: opcionais},
            success: function (data) {
                var test = $.trim(data);
                if (test == 'OK') {

                    $("#opcionaisCarros").empty();
                    $('#idEditarCarro').val("");
                    $('#observacoesEditarCarro').Editor("setText", "");
                    $('#quilometragemEditarCarro').val("");
                    $("#tipoCombustivelEditarCarro").val("");
                    $('#modeloEditarCarro').val("");
                    $("#tipoEditarCarro").val("");
                    $('#corEditarCarro').val("");
                    $('#anoFabricacaoEditarCarro').val("");
                    $('#anoModeloEditarCarro').val("");
                    $('#precoEditarCarro').val("");
                    $('#versaoEditarCarro').val("");

                    $('#modalEditarCarro').modal('hide');

                    $("#erroAlteracaoDadosVazios").hide();
                    var table = $("#tableCarros").DataTable();
                    table.ajax.reload(null, false);

                    $.notify({
                        // options
                        message: 'Alteração executada com sucesso'
                    }, {
                        // settings
                        type: 'success'
                    });
                    
                    bloqueiaMsgAguarde("body", false, "win8_linear");
                    
                } else {
                    $('#modalEditarCarro').modal('hide');
                    $.notify({
                        // options
                        message: 'Erro na alteração!'
                    }, {
                        // settings
                        type: 'danger'
                    });
                    
                    bloqueiaMsgAguarde("body", false, "win8_linear");
                    
                }
            }
        });

    } else {
        $("#erroAlteracaoDadosVazios").show();
    }
}