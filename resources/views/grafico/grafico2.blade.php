@extends ('layouts.admin')
@section ('contenido')

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Laravel Highcharts Demo</title>
</head>
<body>
    <div id="container"></div>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
  
  var j=JSON.parse('<?php echo $data_anual_ddjjs; ?>')
  var jj=JSON.parse('<?php echo $data_anual_ddjj; ?>')
 
    Highcharts.chart('container', {
        title: {
            text:'DECLARACIONES JURADAS APROBADA POR MES 2021 SEGUN ACUERDO'
        },
        xAxis:{
                categories:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
            },
            yAxis:{
                title:{
                    text:'Cantidad  de Acuerdos'

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
            
        name: 'COMUNIDAD ANDINA DE NACIONES',
        data:j.comunidad_andina_naciones
    }, {
        name: 'MERCOSUR',
        data:j.mercosur
    }, {
        name: 'CHILE',
        data:j.chile
    }, {
        name: 'CUBA',
        data:j.cuba
    } ,{
        name: 'ACUERDO CON VENEZUELA',
        data:j.acuerdo_venezuela
    }, {
        name: 'PARAGUAY - SEMILLAS',
        data:j.paraguay_semillas
    }, {
        name: 'ARGENTINA -SEMILLAS',
        data:j.argentina_semillas
    }, {
        name: 'CANADA',
        data:j.canada
    }, {
        name: 'SUIZA',
        data:j.suiza
    },
    {
        name: 'NORUEGA',
        data:j.noruega
    }, {
        name: 'JAPON',
        data:j.japon
    }, 
    {
      name: 'NUEVA ZALANDA',
        data:jj.nueva_zalanda
    }, {
        name: 'BIELORRUSIA',
        data:jj.bielorrusia
    },  {
        name: 'TURQUIA',
        data:jj.turquia
    }, {
        name: 'AUSTRALIA',
        data:jj.australia
    }, {
        name: 'UNION EUROPEA',
        data:jj.union_europea
    }, {
        name: 'ESTADOS UNIDOS',
        data:jj.estados_unidos
    }, {
        name: 'TERCEROS PAISES',
        data:jj.terceros_paises
    }, {
        name: 'PANAMA',
        data:jj.panama
    }, {
        name: 'FEDERACION RUSA',
        data:jj.federacion_rusa
    }, {
        name: 'REINO UNIDO',
        data:jj.reino_unido
    }, 
    {
        name: 'KARAJISTAN',
        data:jj.kazajistan
    
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
