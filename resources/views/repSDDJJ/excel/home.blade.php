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
            
              <!--  -->
                    <h1>SEGUIMIENTO A DECLARACIONES JURADAS</h1>
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
        <table   >
          <tbody>
         
                   <tr>
                    

                       <td colspan="8" align="center"style='font-weight:bold;'class="default"><font color="red">Rango de fechas: {{$f1}}  {{$f2}} </font> </td>
                       <td style='font-weight:bold;'>RRCO ::______</td>
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
                        <th></th>
                        <th  style='font-weight:bold;border:2px solid #f00;'class="table_cabecera1"  align="center" colspan="2"  > REGISTRO</th>
                       
                    </tr>
    

        <tr BGCOLOR="#CFD8DC">
                                        <th style='font-weight:bold;border:2px solid #f00;'>No. </th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>No. DDJJ</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Acuerdo</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>RUEX</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Nombre o Razon Social</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Fecha de Registro </th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Tipo Emision</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'>Estado</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'> Fecha Emision</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'> Fecha Entrega</th>
                                        <th style='font-weight:bold;border:2px solid #f00;'> Regional</th>
                                        <th  style='font-weight:bold;border:2px solid #f00;' >Mes</th>
                                        <th  style='font-weight:bold;border:2px solid #f00; '>año</th>
                      </tr>
        </thead>
        <tbody>
        @foreach($procesos as $proceso)
            <tr >
                                   <td  style='border:4px solid #f00;'>{{$proceso->number_row}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->numero_ddjj}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->acuerdo}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->ruex}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->razon_social}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->fecha_registro}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->emision}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->estado}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->fecha_revision}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->fecha_entrega}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->departamento}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->mes}}</td>
                                   <td  style='border:4px solid #f00;'>{{$proceso->anio}}</td>
            </tr>
        @endforeach

        </tbody>
    </table> 
    <br>

</body>
</html>
