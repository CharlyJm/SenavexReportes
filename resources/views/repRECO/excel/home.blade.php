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
      <td colspan="4" rowspan="5" height=50 width=20><img src="img/logo-snv.png" height=110 width=200  ></td>
      <td colspan="14"  rowspan="5"  align="center">
          <div class="city">
             <h1> REPORTES TAYPI  </h1>
             <h1>REPORTE DE EMISION DE CERTIFICADOS DE ORIGEN</h1>
             <p>{{ date('d-m-Y h:i:s', strtotime(now())) }}</p>
          </div> 
      </td>
      <td  colspan="4" rowspan="5" height=50 width=20><img src="img/taypi-snv.png"   height=110 width=200 >  </td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
</table>
<br>
<table>
   <tbody>
      <tr>
        <td colspan="7" align="center"style='font-weight:bold;'>Corrersponde  a :       Nacional :______</td>
        <td colspan="6" align="center"style='font-weight:bold;'class="default">Periodo: {{$f1}}            al : {{$f2}} </td>
      </tr>
   <tbody>
</table>

        
<table  id="procesos" >
  <thead> 
     <tr >
       <th style='font-weight:bold;border:2px solid #f00;'>No.</th>
       <th style='font-weight:bold;border:2px solid #f00;'>No. <br>Correlativo de  C.O.</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Fecha Emision</th>
       <th style='font-weight:bold;border:2px solid #f00;'>No.Control</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Tipo C.O.</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Acuerdo o <br> Regimen Preferencial</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Clasificacion Arancelaria </th>
       <th style='font-weight:bold;border:2px solid #f00;'>DEscripcion Comercial</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Valor FOB ($sus)</th>
       <th style='font-weight:bold;border:2px solid #f00;'> Peso Neto (Kg)</th>
       <th style='font-weight:bold;border:2px solid #f00;'>No.Factura Comercial</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Criterio de Origen</th>
       <th style='font-weight:bold;border:2px solid #f00;'>RUEX</th>
       <th style='font-weight:bold;border:2px solid #f00;'>No. DDJJ</th>
       <th style='font-weight:bold;border:2px solid #f00;'> Nombre o Razon Social</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Categoria Empresa</th>
       <th style='font-weight:bold;border:2px solid #f00;'> Pais de Destino</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Certificador Origen</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Tipo de Emision</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Observaciones</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Regional</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Mes</th>
       <th style='font-weight:bold;border:2px solid #f00;'>Ano</th>
     </tr>
  </thead>
 <tbody>
 @foreach($procesos as $proceso)
     <tr >
          <td style='border:4px solid #f00;'>{{$proceso-> number_row}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->nro_emision}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->fecha_emision}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->nro_control}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->tipo_co}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->acuerdo}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->cod_arancelario}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->denominacion_mercaderia}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->valor_fob_total}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->peso_neto}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->num_factura}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->criterio}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->ruex}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->num_ddjj}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->razon_social}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->descripcion_categoria}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->pais_destino}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->certificador}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->descripcion_co_tipo_emision}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->observaciones}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->regional}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->mes}}</td>
          <td style='border:4px solid #f00;'>{{$proceso->year}}</td>
                           
     </tr>
 @endforeach
 </tbody>
</table> 
</body>
</html>
