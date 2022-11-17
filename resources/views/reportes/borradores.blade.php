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
        <td colspan="3"rowspan="3"  align="center">
             
             <div class="city">
                <h1> REPORTES TAYPI  </h1>
                    <h2>LISTADO DE  DECLARACIONES JURADAS - EXPORTADOR</h2>
                    <p></p>
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
        <table >
          <tbody>
         
                @foreach($empresas as $empresa)
                   <tr>
                     <td></td>
                       <td style='font-weight:bold; border:1px solid #f00;' class="default">1. Razón Social:</td>
                       <td style='border:1px solid #f00;' > {{$empresa->razon_social}}</td> 
                       <td style='font-weight:bold; border:1px solid #f00;' scope="row">2. Nombre comercial:</td>
                       <td style='border:1px solid #f00;'> {{$empresa->nombre_comercial}}</td> 
                   </tr>
               
                   <tr>
                    <td></td>
                       <td style='font-weight:bold; border:1px solid #f00;'>3. Telefono:</td>
                       <td style='border:1px solid #f00;'> {{$empresa->telefono}}</td> 
                       <td style='font-weight:bold; border:1px solid #f00;'>4. Celular:</td>
                       <td style='border:1px solid #f00;'> {{$empresa->celular}}</td> 
                   
                   </tr>
                   <tr>
                    <td></td>
                       <td style='font-weight:bold; border:1px solid #f00;'>5. Email:</td>
                       <td style='border:1px solid #f00;'> {{$empresa->email}}</td> 
                       <td style='font-weight:bold; border:1px solid #f00;'>6. nit:</td>
                       <td style='border:1px solid #f00;'> {{$empresa->nit}}</td> 
                   
                   </tr>
               @endforeach
               <tbody>
          </table>

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
