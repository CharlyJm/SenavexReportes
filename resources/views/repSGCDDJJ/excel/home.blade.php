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
                    <h1>REGISTRO DE SOLICITUDES DDJJ</h1>
                    <p>{{ date('d-m-Y h:i:s', strtotime(now())) }}</p>
            
             </div> 
   </td>

    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
</table>
<br>
        <table   >
          <tbody>
         
                   <tr>
                       <td colspan="8" align="center"style='font-weight:bold;'class="default"> del : {{$f1}}    </td>
                       <td style='font-weight:bold;'>Regional ::______</td>
                   </tr>
                   <tr>
                       <td colspan="8" align="center" style='font-weight:bold;'class="default">al : {{$f2}}  </td>
                   </tr>
            
               <tbody>
        </table>

         
     <table  id="procesos" >
                    
        <thead>
        <tr>
        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th  style='font-weight:bold;border:2px solid #f00;'  align="center" colspan="4"  > RESULTADO</th>
                       
                    </tr>
    

        <tr BGCOLOR="#CFD8DC">
                                       
                                        <th style='font-weight:bold;border:2px solid #f00;'> No.</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Nombre o Razon Social</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>NIT o C.I.</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>RUEX</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Resepcion Solicitud  <br> Fecha y Hora</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Aprobado o Rechazado</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Certificador</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'> Revicion Solicitud <br>FEcha y Hora</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Observacion</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Regional</th>
                                        <th style='font-weight:bold;border:2px solid #f00;' > Mes</th>
                                        <th style='font-weight:bold;border:2px solid #f00;' >Año</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Horas</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>En Plazo</th>
                      </tr>
        </thead>
        <tbody>
        @foreach($procesos as $proceso)
            <tr >
                                   <td style='border:4px solid #f00;'>{{$proceso->number_row}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->razon_social}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->nit}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->ruex}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->fecha_registro}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->estado}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->certificador}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->fecha_entrega}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->observaciones}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->regional}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->mes}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->anio}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->horas}}</td>
                                   <td style='border:4px solid #f00;'>{{$proceso->lapso}}</td>
                </tr>
        @endforeach

        </tbody>
    </table> 
    <br>

</body>
</html>
