<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<br>

<table>
    <tr> 
    <td ></td>
      <td colspan="3" rowspan="5" height=50 width=20><img src="img/logo-snv.png" height=150 width=250  ></td>
        <td colspan="14"  rowspan="5"  align="center">
        <div class="city">
            
              <!--  -->
                 <h1> REPORTES TAYPI  </h1>
                    <h1>REPORTE DE EMISION DE CERTIFICADOS DE ORIGEN</h1>
                    <p>{{ date('d-m-Y h:i:s', strtotime(now())) }}</p>
            
             </div> 
   </td>
        <!-- <td rowspan="3"  ><img src="img/taypi-snv.png"  width="50px" height="100px">  </td> -->
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
</table>
<br>
        <table   >
          <tbody>
         
                   <tr>
                    

                       <td colspan="8" align="center"style='font-weight:bold;'class="default">Rango de fechas: {{$f1}}   - {{$f2}} </td>
                       <td style='font-weight:bold;'>RRCO ::______</td>
                   </tr>
            
               <tbody>
        </table>

        <table>
            <tr>
                <td colspan="23"  align="center">LISTADO   DE REPORTE DE EMISION DE CERTIFICADOS DE ORIGEN</td>
            </tr>
       </table>
     <table  id="procesos" >
                    
        <thead>
        <tr >
        <th style='font-weight:bold;border:2px solid #f00;'>N* </th>
        <th style='font-weight:bold;border:2px solid #f00;'>No. </th>
        <th style='font-weight:bold;border:2px solid #f00;'>No. CORRELATIVO DE C.O.</th>
        <th style='font-weight:bold;border:2px solid #f00;'>FECHA EMISION</th>
        <th style='font-weight:bold;border:2px solid #f00;'>No. CONTROL</th>
        <th style='font-weight:bold;border:1px solid #f00;'>TIPO C.O.</th>
        <th style='font-weight:bold;border:1px solid #f00;'>ACUERDO O REGIMEN PREFERENCIAL</th>
        <th style='font-weight:bold;border:1px solid #f00;'>CLASIFICACION ARANCELES</th>
        <th style='font-weight:bold;border:1px solid #f00;'>DESCRIPCION COMERCIAL</th>
        <th style='font-weight:bold;border:1px solid #f00;'>VALOR FOB ($us)</th>
        <th style='font-weight:bold;border:1px solid #f00;'>PESO NETO(Kg)</th>
        <th style='font-weight:bold;border:1px solid #f00;'>No.FACTURACION COMERCIAL</th>
        <th style='font-weight:bold;border:1px solid #f00;'>CRITERIO DE ORIGEN</th>
        <th style='font-weight:bold;border:1px solid #f00;'>RUEX</th>
        <th style='font-weight:bold;border:1px solid #f00;'>No.DDJJ</th>
        <th style='font-weight:bold;border:1px solid #f00;'>NOMBRE 0 RAZON SOCIAL</th>
        <th style='font-weight:bold;border:1px solid #f00;'>CATEGORIA EMPRESA</th>
        <th style='font-weight:bold;border:1px solid #f00;'>PAIS DESTINO</th>
        <th style='font-weight:bold;border:1px solid #f00;'>CERTIFICADOR ORIGEN</th>
        <th style='font-weight:bold;border:1px solid #f00;'>TIPO DE EMICION</th>
        <th style='font-weight:bold;border:1px solid #f00;'>OBSERVACION</th>
        <th style='font-weight:bold;border:1px solid #f00;'>REGIONAL</th>
        <th style='font-weight:bold;border:1px solid #f00;'>MES</th>
        <th style='font-weight:bold;border:1px solid #f00;'>AÑO</th>       
        </tr>
        </thead>
        <tbody>
        @foreach($procesos as $proceso)
            <tr >
                                    <td style='border:4px solid #f00;'>{{$proceso->ruex}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->co_correlativo}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->fecha_emision}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->nro_control}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->tico_co}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->ac_rp}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->cla_arancelaria}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->descripcion_comercial}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->valor_fob}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->peso_neto}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->num_factura}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->criterio}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->ruex}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->numero_ddjj}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->numero_ddjj_old}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->razon_social}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->descripcion_categoria}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->pais_destino}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->descripcion_co_tipo_emision}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->observaciones_grals}}</td>
                                    <td>????</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->mes}}</td>
                                    <td style='border:4px solid #f00;'>{{$proceso->anio}}</td>
            </tr>
        @endforeach

        </tbody>
    </table> 
    <br>

</body>
</html>
