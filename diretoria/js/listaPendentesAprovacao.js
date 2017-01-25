$(document).ready(function () {
    getTodos();
});

function getTodos() {

    $('#tableAssociadosPendentes').DataTable({
        "ajax": {"url": "../diretoria/funcoes/funcoesPendentesAprovacao.php", data: {"funcao": "getTodos"}, "type": "POST"},
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
        url: '../diretoria/funcoes/funcoesListaPendentesAprovacao.php',
        data: {funcao: "getFichaAssociadoPendente", codigo: codigo},
        success: function (data) {
            var test = jQuery.parseJSON(data);

            $("#nomeAluno").text(test[0]['nome']);
            $("#dtNascimento").text(test[0]['dtnascimento']);
            $("#rgAluno").text(test[0]['rg']);
            
            var cpf = preencheZerosAEsquerdaCPF(test[0]['cpf']);
            
            $("#cpfAluno").text(cpf);
            $("#tituloEleitorAluno").text(test[0]['tituloeleitor']);
            $("#zonaEleitoralAluno").text(test[0]['zonaeleitoral']);
            $("#secaoEleitoralAluno").text(test[0]['secaoeleitoral']);
            $("#enderecoAluno").text(test[0]['endereco']);
            $("#ufAluno").text(test[0]['nomeestado']);
            $("#cidadeAluno").text(test[0]['nomecidade']);
            $("#bairroAluno").text(test[0]['bairro']);
            $("#cepAluno").text(test[0]['cep']);
            $("#celularAluno").text(test[0]['celular']);
            $("#telefoneAluno").text(test[0]['telefone']);
            $("#emailAluno").text(test[0]['email']);
            $("#cursoAluno").text(test[0]['curso']);
            $("#matriculaAluno").text(test[0]['matricula']);
            $("#tipoSanguineoAluno").text(test[0]['tiposanguineo']);
            $("#semestreAluno").text(test[0]['semestre']);
            $("#paradaAluno").text(test[0]['parada']);
            $("#entidadeAluno").text(test[0]['entidade']);
            $("#melhorDiaPagamento").text(test[0]['diapagamento']);


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