@extends ('layouts.admin')
@section ('contenido')

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>senavex</title>
</head>

<body>
    <div id="container"></div>
</body>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
  
  var dato=JSON.parse('<?php echo $total_mes; ?>')
Highcharts.chart('container', {

title: {
    text: 'DECLARACIONES JURADAS APROBADA POR MES 2021'
},
yAxis: {
    title: {
        text: 'Numero de Acuerdos'
    }
},
        xAxis:{
                categories:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
            },
            yAxis:{
                title:{
                    text:'Numero de Acuerdos'

            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
    name: 'Total :',
    data: dato.total_mes
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>
</html>
@endsection
