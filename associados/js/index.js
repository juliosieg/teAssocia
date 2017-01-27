function enviarSugestao() {

    var sugestao = $("#sugestaoAluno").val();

    $.ajax({
        type: "POST",
        url: 'funcoes/funcoesIndex.php',
        data: {funcao: "enviarSugestao", sugestao: sugestao},
        success: function (html) {
            var test = $.trim(html);

            if (test == 'OK') {
                swal("Obrigado!", "Sua sugestão foi enviada com sucesso.", 'success');
            } else {
                swal("Erro!", "Ocorreu um erro no envio da sugestão, tente novamente.", 'error');
            }
        }
    });
}