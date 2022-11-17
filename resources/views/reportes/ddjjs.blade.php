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
      <td rowspan="3"  ALIGN=LEFT><img src="img/logo-snv.png"  width="50px" height="100px"  colspan="2" >  </td>
        <td colspan="3"  rowspan="3"  align="center">
        <div class="city">
            
                <h1> REPORTES TAYPI  </h1>
                    <h2>LISTADO DE  DECLARACIONES JURADAS - EXPORTADOR</h2>
                    <p>{{ date('d-m-Y h:i:s', strtotime(now())) }}</p>
                    <br>
            
             </div> 
   </td>
        <td rowspan="2"  ><img src="img/taypi-snv.png"  width="50px" height="100px">  </td>
    </tr>
       <!-- <tr>
        <td></td>
        <td></td>
        <td colspan="3"  align="center">LISTADO DE  DECLARACIONES JURADAS - EXPORTADOR</td>
        </tr> -->
   
   
</table>
<br>
        <table   >
          <tbody>
         
                @foreach($empresas as $empresa)
                   <tr colspan="6"   >
                     <td></td>
                       <td style='font-weight:bold;'class="default">1. Razón Social:</td>
                       <td  > {{$empresa->razon_social}}</td> 
                       <td style='font-weight:bold;'>2. Nombre comercial:</td>
                       <td> {{$empresa->nombre_comercial}}</td> 
                   </tr>
               
                   <tr>
                    <td></td>
                       <td style='font-weight:bold;'>3. Telefono:</td>
                       <td> {{$empresa->telefono}}</td> 
                       <td style='font-weight:bold;'>4. Celular:</td>
                       <td> {{$empresa->celular}}</td> 
                   
                   </tr>
                   <tr>
                    <td></td>
                       <td style='font-weight:bold;'>5. Email:</td>
                       <td> {{$empresa->email}}</td> 
                       <td style='font-weight:bold;'>6. nit:</td>
                       <td > {{$empresa->nit}}</td> 
                   
                   </tr>
               @endforeach
               <tbody>
        </table>
<br>
<br>
        <table>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3"  align="center">LISTADO DE DECLARACION JURADA :::  HABILITADAS</td>
            </tr>
       </table>
     <table>
                    
        <thead>
        <tr >
        <th style='font-weight:bold;border:1px solid #f00;'>N* </th>
        <th style='font-weight:bold;border:1px solid #f00;'>NUMERO DDJJ</th>
        <th style='font-weight:bold; border:1px solid #f00;'>ACUERDO</th>
        <th style='font-weight:bold; border:1px solid #f00;'>ESTADO</th>
        <th style='font-weight:bold; border:1px solid #f00;'>FECHA APROBACION</th>
        <th style='font-weight:bold; border:1px solid #f00;'>FECHA VENCIMIENTO</th>
                                
        </tr>
        </thead>
        <tbody>
        @foreach($ddjjs as $ddjj)  
            <tr >
              <td>{{$ddjj-> number_row}}</td>
             <td> {{$ddjj->numero_ddjj}}</td>
               <td>{{$ddjj->acuerdo_sigla}}</td>
                <td>{{$ddjj->estado_descripcion}}</td>
               <td>{{$ddjj->fecha_vencimiento}}</td>
            </tr>
        @endforeach

        </tbody>
    </table> 
    <br>
    <table>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3"  align="center">LISTADO DE DECLARACION JURADA :::  BAJAS</td>
            </tr>
       </table>

<table >

    <thead>
        <tr>
            <th style='font-weight:bold; border:1px solid #f00;'>N* </th>
            <th style='font-weight:bold; border:1px solid #f00;'>NUMERO DDJJ</th>
            <th style='font-weight:bold; border:1px solid #f00;'>ACUERDO</th>
            <th style='font-weight:bold; border:1px solid #f00;'>ESTADO</th>
            <th style='font-weight:bold; border:1px solid #f00;'>FECHA BAJA</th>
            
        </tr>
    </thead>    
            @foreach($bajas as $baja)   
                        <tr>
                            
                            <td>{{$baja-> number_row}}</td>
                            <td> {{$baja->numero_ddjj}}</td>
                            <td>{{$baja->acuerdo_sigla}}</td>
                            <td>{{$baja->estado_descripcion}}</td>
                            <td>{{$baja->fecha_baja}}</td>
                        </tr>
            @endforeach
</table>
</body>
</html>
