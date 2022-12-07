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
                    <h1>REPORTE DE DECLARACION  JURADA DE ORIGEN</h1>
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
                    
                        <td colspan="7" align="center"style='font-weight:bold;'>Corrersponde  a :       Nacional :______</td>
                       <td colspan="6" align="center"style='font-weight:bold;'class="default">Periodo: {{$f1}}            al : {{$f2}} </td>
                       
                   </tr>
            
               <tbody>
        </table>

        
     <table  id="procesos" >
                    
        <thead>
        <tr >
        <th style='font-weight:bold;border:2px solid #f00;'>No. </th>
        <th style='font-weight:bold;border:2px solid #f00;'>RUEX</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Nombre o Razon Social</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Departamento de domicilio fiscal de la Empresa</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Categoria Empresa</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Acuerdo o Regimen Preferencial</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Descripcion Comercial</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Clasificacion NANDINA</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Clacificacion NALANDISA </th>
        <th style='font-weight:bold;border:2px solid #f00;'>Criterio  de Origen</th>
        <th style='font-weight:bold;border:2px solid #f00;'>No. Declaracion Jurada</th>
        <th style='font-weight:bold;border:2px solid #f00;'> Fecha de Approbacion</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Fecha de Vencimiento</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Fecha de Baja</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Certificador</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Observaciones</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Mes</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Ano</th>
        <th style='font-weight:bold;border:2px solid #f00;'>Regional</th>     
        </tr>
        </thead>
        <tbody>
        @foreach($procesos as $proceso)
            <tr >
              <td style='border:4px solid #f00;'>{{$proceso-> number_row}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->ruex}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->razon_social}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->departamento}}</td>
                <td style='border:4px solid #f00;'>{{$proceso-> descripcion_categoria}}
                <td style='border:4px solid #f00;'>{{$proceso->acuerdo}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->denominacion_comercial}}
                <td style='border:4px solid #f00;'>{{$proceso->nandina}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->naladisa}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->criterio}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->id_acuerdo}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->fecha_aprobacion}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->fecha_vencimiento}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->fecha_baja}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->certificador}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->observaciones}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->mes}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->anio}}</td>
                <td style='border:4px solid #f00;'>{{$proceso->mes}}</td>
                                  
            </tr>
        @endforeach

        </tbody>
    </table> 
    <br>

</body>
</html>
