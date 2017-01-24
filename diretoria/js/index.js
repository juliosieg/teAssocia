$(document).ready(function () {

    getAssociadosCadastrados();

    getAssociadosPendentes();

    preencheGrafico1();

    preencheGrafico2();

});

function getAssociadosCadastrados() {

    $.ajax({
        type: "POST",
        url: '../diretoria/funcoes/funcoesIndex.php',
        data: {funcao: "getAssociadosCadastrados"},
        success: function (data) {
            var test = jQuery.parseJSON(data);
            $("#totalAssociados").text(test[0]["count"]);
        }
    });
}

function getAssociadosPendentes() {

    $.ajax({
        type: "POST",
        url: '../diretoria/funcoes/funcoesIndex.php',
        data: {funcao: "getAssociadosPendentes"},
        success: function (data) {
            var test = jQuery.parseJSON(data);
            $("#totalAssociadosPendentes").text(test[0]["count"]);
        }
    });
}

function preencheGrafico1() {

    var associadosPendentes = null;
    var associadosCadastrados = null;

    $.ajax({
        type: "POST",
        url: '../diretoria/funcoes/funcoesIndex.php',
        data: {funcao: "getAssociadosCadastrados"},
        success: function (data) {
            var test = jQuery.parseJSON(data);
            associadosCadastrados = test[0]["count"];
        },
        complete: function () {

            $.ajax({
                type: "POST",
                url: '../diretoria/funcoes/funcoesIndex.php',
                data: {funcao: "getAssociadosPendentes"},
                success: function (data) {
                    var test = jQuery.parseJSON(data);
                    associadosPendentes = test[0]["count"];
                },
                complete: function () {


                    var donutData = [
                        {label: "Cadastrados", data: associadosCadastrados, color: "#3c8dbc"},
                        {label: "Pendentes", data: associadosPendentes, color: "#0073b7"}
                    ];
                    $.plot("#donut-chart", donutData, {
                        series: {
                            pie: {
                                show: true,
                                radius: 1,
                                innerRadius: 0.5,
                                label: {
                                    show: true,
                                    radius: 2.3 / 3,
                                    formatter: labelFormatter,
                                    threshold: 0.1
                                }

                            }
                        },
                        legend: {
                            show: false
                        }
                    });

                    /*
                     * Custom Label formatter
                     * ----------------------
                     */
                    function labelFormatter(label, series) {
                        return '<div style="font-size:10px; text-align:center; padding:10px; color: #fff; font-weight: 600;">'
                                + label
                                + "<br>"
                                + Math.round(series.percent) + "%</div>";
                    }
                }
            });

        }
    });
}

function preencheGrafico2() {

    $.ajax({
        type: "POST",
        url: '../diretoria/funcoes/funcoesIndex.php',
        data: {funcao: "getAssociadosPorEntidade"},
        success: function (data) {
            var test = jQuery.parseJSON(data);

            var entidades = [];
            var valores = [];

            for (var i = 0; i < test.length; i++) {
                //se for par é entidade senão é valor
                if (i % 2 == 0) {
                    entidades.push(test[i]);
                } else {
                    valores.push(test[i]);
                }
            }

            var donutData = [];

            for (var i = 0; i < entidades.length; i++) {
                donutData.push({label: entidades[i], stack: true, data: valores[i]});
            }


            $.plot('#cadastrados-entidade', donutData, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 1,
                            formatter: labelFormatter,
                            background: {
                                opacity: 0.8
                            }
                        }
                    }
                },
                legend: {
                    show: false
                }
            });

            function labelFormatter(label, series) {
                return '<div style="font-size:10px; text-align:center; padding:10px; color: #000; font-weight: bold;">'
                        + label
                        + "<br>"
                        + Math.round(series.percent) + "%</div>";
            }


        }
    });
}


