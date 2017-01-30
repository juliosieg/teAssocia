$(document).ready(function () {
    getTodos();

});

function getTodos() {

    $('#tableAssociadosPendentes').DataTable({
        "ajax": {"url": "../diretoria/funcoes/funcoesListarAssociados.php", data: {"funcao": "getTodos"}, "type": "POST"},
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

function verFicha(codigo) {

    $("#modalVerFicha").modal("show");
    $.ajax({
        type: "POST",
        url: '../diretoria/funcoes/funcoesListarAssociados.php',
        data: {funcao: "getFichaAssociadoPendente", codigo: codigo},
        success: function (data) {
            var test = jQuery.parseJSON(data);

            $("#nomeAluno").text("");
            $("#dtNascimento").text("");
            $("#rgAluno").text("");
            $("#cpfAluno").text("");
            $("#tituloEleitorAluno").text("");
            $("#zonaEleitoralAluno").text("");
            $("#secaoEleitoralAluno").text("");
            $("#enderecoAluno").text("");
            $("#ufAluno").text("");
            $("#cidadeAluno").text("");
            $("#bairroAluno").text("");
            $("#cepAluno").text("");
            $("#celularAluno").text("");
            $("#emailAluno").text("");
            $("#cursoAluno").text("");
            $("#matriculaAluno").text("");
            $("#tipoSanguineoAluno").text("");
            $("#semestreAluno").text("");
            $("#paradaAluno").text("");
            $("#entidadeAluno").text("");
            $("#melhorDiaPagamento").text("");
            $("#fevSeg").html("<p align='center'></p>");
            $("#fevTer").html("<p align='center'></p>");
            $("#fevQua").html("<p align='center'></p>");
            $("#fevQui").html("<p align='center'></p>");
            $("#fevSex").html("<p align='center'></p>");
            $("#fevSab").html("<p align='center'></p>");
            $("#marSeg").html("<p align='center'></p>");
            $("#marTer").html("<p align='center'></p>");
            $("#marQua").html("<p align='center'></p>");
            $("#marQui").html("<p align='center'></p>");
            $("#marSex").html("<p align='center'></p>");
            $("#marSab").html("<p align='center'></p>");
            $("#abrSeg").html("<p align='center'></p>");
            $("#abrTer").html("<p align='center'></p>");
            $("#abrQua").html("<p align='center'></p>");
            $("#abrQui").html("<p align='center'></p>");
            $("#abrSex").html("<p align='center'></p>");
            $("#abrSab").html("<p align='center'></p>");
            $("#maiSeg").html("<p align='center'></p>");
            $("#maiTer").html("<p align='center'></p>");
            $("#maiQua").html("<p align='center'></p>");
            $("#maiQui").html("<p align='center'></p>");
            $("#maiSex").html("<p align='center'></p>");
            $("#maiSab").html("<p align='center'></p>");
            $("#junSeg").html("<p align='center'></p>");
            $("#junTer").html("<p align='center'></p>");
            $("#junQua").html("<p align='center'></p>");
            $("#junQui").html("<p align='center'></p>");
            $("#junSex").html("<p align='center'></p>");
            $("#junSab").html("<p align='center'></p>");
            $("#julSeg").html("<p align='center'></p>");
            $("#julTer").html("<p align='center'></p>");
            $("#julQua").html("<p align='center'></p>");
            $("#julQui").html("<p align='center'></p>");
            $("#julSex").html("<p align='center'></p>");
            $("#julSab").html("<p align='center'></p>");

            $("#telefoneAluno").text("");
            $("#matriculaAluno").text("");
            $("#fotoAluno").text("");
            $("#tituloEleitorFoto").text("");
            $("#comprovanteMatricula").text("");


            /* Inicio do preenchimento */

            $("#nomeAluno").text(test[0]['nome']);
            $("#dtNascimento").text(test[0]['dtnascimento']);
            $("#rgAluno").text(test[0]['rg']);

            var cpf = preencheZerosAEsquerdaCPF(test[0]['cpf']);
            
            $("#cpfAluno").text(format('XXX.XXX.XXX-XX', cpf));
            
            $("#tituloEleitorAluno").text(test[0]['tituloeleitor']);
            $("#zonaEleitoralAluno").text(test[0]['zonaeleitoral']);
            $("#secaoEleitoralAluno").text(test[0]['secaoeleitoral']);
            $("#enderecoAluno").text(test[0]['endereco']);
            $("#ufAluno").text(test[0]['nomeestado']);
            $("#cidadeAluno").text(test[0]['nomecidade']);
            $("#bairroAluno").text(test[0]['bairro']);
            
            $("#cepAluno").text(format('XXXXX-XXX',test[0]['cep']));
            
            
            var celular = test[0]['celular'];
            if(celular.length == 11){
                $("#celularAluno").text(format('(XX) XXXXX-XXXX', celular));
            }else{
                $("#celularAluno").text(format('(XX) XXXX-XXXX', celular));
            }

            $("#emailAluno").text(test[0]['email']);
            $("#cursoAluno").text(test[0]['curso']);
            $("#matriculaAluno").text(test[0]['matricula']);
            $("#tipoSanguineoAluno").text(test[0]['tiposanguineo']);
            $("#semestreAluno").text(test[0]['semestre']);
            $("#paradaAluno").text(test[0]['parada']);
            $("#entidadeAluno").text(test[0]['entidade']);
            $("#melhorDiaPagamento").text(test[0]['diapagamento']);

            if (test[0]['telefone'] != null && test[0]['telefone'] != "") {
                $("#telefoneAluno").text(format('(XX) XXXX-XXXX',test[0]['telefone']));
            } else {
                $("#telefoneAluno").text("Não preenchido");
            }

            if (test[0]['matricula'] != null && test[0]['matricula'] != "") {
                $("#matriculaAluno").text(test[0]['matricula']);
            } else {
                $("#matriculaAluno").text("Não preenchido");
            }

            if (test[0]['imagem_perfil'] != null && test[0]['imagem_perfil'] != "") {
                $("#fotoAluno").html("<a href='" + test[0]['imagem_perfil'] + "' target='_blank'>Ver Foto</a>");
            } else {
                $("#fotoAluno").text("Não preenchido");
            }

            if (test[0]['fototituloeleitor'] != null && test[0]['fototituloeleitor'] != "") {
                $("#tituloEleitorFoto").html("<a href='" + test[0]['fototituloeleitor'] + "' target='_blank'>Ver Título de Eleitor</a>");
            } else {
                $("#tituloEleitorFoto").text("Não preenchido");
            }

            if (test[0]['comprovantematricula'] != null && test[0]['comprovantematricula'] != "") {
                $("#comprovanteMatricula").html("<a href='" + test[0]['comprovantematricula'] + "' target='_blank'>Ver Comprovante de Matrícula</a>");
            } else {
                $("#comprovanteMatricula").text("Não preenchido");
            }
            
            var observacoesAluno = test[0]['observacoesaluno'];
            var newObservacoes = observacoesAluno.trim("");
            
            if (observacoesAluno != null && observacoesAluno != "" && newObservacoes != "" && newObservacoes != null) {
                $("#observacoesAluno").text(test[0]['observacoesaluno']);
            } else {
                $("#observacoesAluno").text("Não preenchido");
            }  

            if (test[0]['segfev'] == '1') {
                $("#fevSeg").html("<p align='center'>X</p>");
            }

            if (test[0]['terfev'] == '1') {
                $("#fevTer").html("<p align='center'>X</p>");
            }

            if (test[0]['quafev'] == '1') {
                $("#fevQua").html("<p align='center'>X</p>");
            }

            if (test[0]['quifev'] == '1') {
                $("#fevQui").html("<p align='center'>X</p>");
            }

            if (test[0]['sexfev'] == '1') {
                $("#fevSex").html("<p align='center'>X</p>");
            }

            if (test[0]['sabfev'] == '1') {
                $("#fevSab").html("<p align='center'>X</p>");
            }

            if (test[0]['segmar'] == '1') {
                $("#marSeg").html("<p align='center'>X</p>");
            }

            if (test[0]['termar'] == '1') {
                $("#marTer").html("<p align='center'>X</p>");
            }

            if (test[0]['quamar'] == '1') {
                $("#marQua").html("<p align='center'>X</p>");
            }

            if (test[0]['quimar'] == '1') {
                $("#marQui").html("<p align='center'>X</p>");
            }

            if (test[0]['sexmar'] == '1') {
                $("#marSex").html("<p align='center'>X</p>");
            }

            if (test[0]['sabmar'] == '1') {
                $("#marSab").html("<p align='center'>X</p>");
            }

            if (test[0]['segabr'] == '1') {
                $("#abrSeg").html("<p align='center'>X</p>");
            }

            if (test[0]['terabr'] == '1') {
                $("#abrTer").html("<p align='center'>X</p>");
            }

            if (test[0]['quaabr'] == '1') {
                $("#abrQua").html("<p align='center'>X</p>");
            }

            if (test[0]['quiabr'] == '1') {
                $("#abrQui").html("<p align='center'>X</p>");
            }

            if (test[0]['sexabr'] == '1') {
                $("#abrSex").html("<p align='center'>X</p>");
            }

            if (test[0]['sababr'] == '1') {
                $("#abrSab").html("<p align='center'>X</p>");
            }

            if (test[0]['segmai'] == '1') {
                $("#maiSeg").html("<p align='center'>X</p>");
            }

            if (test[0]['termai'] == '1') {
                $("#maiTer").html("<p align='center'>X</p>");
            }

            if (test[0]['quamai'] == '1') {
                $("#maiQua").html("<p align='center'>X</p>");
            }

            if (test[0]['quimai'] == '1') {
                $("#maiQui").html("<p align='center'>X</p>");
            }

            if (test[0]['sexmai'] == '1') {
                $("#maiSex").html("<p align='center'>X</p>");
            }

            if (test[0]['sabmai'] == '1') {
                $("#maiSab").html("<p align='center'>X</p>");
            }

            if (test[0]['segjun'] == '1') {
                $("#junSeg").html("<p align='center'>X</p>");
            }

            if (test[0]['terjun'] == '1') {
                $("#junTer").html("<p align='center'>X</p>");
            }

            if (test[0]['quajun'] == '1') {
                $("#junQua").html("<p align='center'>X</p>");
            }

            if (test[0]['quijun'] == '1') {
                $("#junQui").html("<p align='center'>X</p>");
            }

            if (test[0]['sexjun'] == '1') {
                $("#junSex").html("<p align='center'>X</p>");
            }

            if (test[0]['sabjun'] == '1') {
                $("#junSab").html("<p align='center'>X</p>");
            }

            if (test[0]['segjul'] == '1') {
                $("#julSeg").html("<p align='center'>X</p>");
            }

            if (test[0]['terjul'] == '1') {
                $("#julTer").html("<p align='center'>X</p>");
            }

            if (test[0]['quajul'] == '1') {
                $("#julQua").html("<p align='center'>X</p>");
            }

            if (test[0]['quijul'] == '1') {
                $("#julQui").html("<p align='center'>X</p>");
            }

            if (test[0]['sexjul'] == '1') {
                $("#julSex").html("<p align='center'>X</p>");
            }

            if (test[0]['sabjul'] == '1') {
                $("#julSab").html("<p align='center'>X</p>");
            }


        }
    });
}

function preencheZerosAEsquerdaCPF(str) {
    var foo = str; // preencha esta variável com o seu texto.
    /* sério, preencha foo. */
    foo += ""; // só por paranóia. Se foo não era string até aqui, depois desta linha será.

    while (foo.length < 11) {
        foo = "0" + foo;
    }

    return foo;
// agora coloque foo de novo na caixa de texto.
}

function format(mask, number) {
   var s = ''+number, r = '';
   for (var im=0, is = 0; im<mask.length && is<s.length; im++) {
     r += mask.charAt(im)=='X' ? s.charAt(is++) : mask.charAt(im);
   }
   return r;
}  

