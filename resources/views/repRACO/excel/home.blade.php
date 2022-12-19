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
         <td colspan="3" rowspan="5" height=50 width=20><img src="img/logo-snv.png" height=110 width=200  ></td>
         <td colspan="5"  rowspan="5"  align="center">
           <div class="city">
             <h1>REPORTE DE ANULACION   <br>  DE CERTIFICADOS DE ORIGEN </h1>
             <p>{{ date('d-m-Y h:i:s', strtotime(now())) }}</p>
           </div>
          </td>
         <td  colspan="3" rowspan="5" height=50 width=20><img src="img/taypi-snv.png"   height=110 width=200 >  </td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
</table>
<br>
 <table>
   <tbody>
     <tr>
       <td colspan="8" align="center"style='font-weight:bold;'class="default"><font color="red">Rango de fechas: {{$f1}}  {{$f2}} </font> </td>
       <td style='font-weight:bold;'>Regional ::______</td>
     </tr>
  </tbody>
 </table>
 <table  id="procesos" >
   <thead>
     <tr BGCOLOR="#CFD8DC">
        <th   style='font-weight:bold;border:2px solid #f00;'> <font color="red">No.</font> </th>
        <th   style='font-weight:bold;border:2px solid #f00;'>Fecha Anulacion</th>
        <th   style='font-weight:bold;border:2px solid #f00;'>No. Control</th>
        <th   style='font-weight:bold;border:2px solid #f00;'>Tipo C.O.</th>
        <th   style='font-weight:bold;border:2px solid #f00;'>RUEX</th>
        <th   style='font-weight:bold;border:2px solid #f00;'> Nombre o Razon Social</th>
        <th   style='font-weight:bold;border:2px solid #f00;'>Regional</th>
        <th   style='font-weight:bold;border:2px solid #f00;'>Tipo Anulacion</th>
        <th   style='font-weight:bold;border:2px solid #f00;'> Motivo u Observacion</th>
        <th   style='font-weight:bold;border:2px solid #f00;'> Mes</th>
        <th   style='font-weight:bold;border:2px solid #f00;'> Año</th>
        <th   style='font-weight:bold;border:2px solid #f00;'> Certificador</th>
     </tr>
   </thead>
   <tbody>
   @foreach($procesos as $proceso)
      <tr>
         <td  style='border:4px solid #f00;'>{{$proceso->number_row}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->fecha_anulacion}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->nro_control}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->descripcion_co_tipo}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->ruex}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->razon_social}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->ciudad}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->tipo_anulacion_2}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->observaciones}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->mes}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->year}}</td>
         <td  style='border:4px solid #f00;'>{{$proceso->certificador}}</td>
        
      </tr>
  @endforeach
  </tbody>
</table>

</body>
</html>
