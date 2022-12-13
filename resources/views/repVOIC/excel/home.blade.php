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
      <td colspan="3" rowspan="5" height=50 width=20><img src="img/logo-snv.png" height=110 width=200  ></td>
        <td colspan="12"  rowspan="5"  align="center">
        <div class="city">
            
              <!--  -->
                    <h1 style='font-weight:bold;'> VENTAS DE CERTIFICADOS O.I.C.  </h1>
                  
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
                    
                        <td colspan="7" align="center"style='font-weight:bold;'> Nacional :______</td>
                       <td colspan="6" align="center"style='font-weight:bold;'class="default">Periodo: {{$f1}}  al : {{$f2}} </td>
                       
                   </tr>
            
               <tbody>
        </table>

        
            <table  id="procesos" >
                            
                    <thead>
                        <tr >
                           
                            <th style='font-weight:bold;border:2px solid #f00;'>No </th>
                            <th colspan="7"style='font-weight:bold;border:2px solid #f00;'>Exportador</th>
                            <th style='font-weight:bold;border:2px solid #f00;'>N*</th>
                            <th style='font-weight:bold;border:2px solid #f00;'>Lote</th>
                            <th style='font-weight:bold;border:2px solid #f00;'>Sacos <br>(60 Kg)</th>
                            <th style='font-weight:bold;border:2px solid #f00;'>Volumen <br>(Kg)</th>
                            <th style='font-weight:bold;border:2px solid #f00;'>T/C</th> 
                            <th style='font-weight:bold;border:2px solid #f00;'>P.U. <br> ($us)</th>
                            <th style='font-weight:bold;border:2px solid #f00;'>fecha</th>
                            <th style='font-weight:bold;border:2px solid #f00;'>Recibo Oficial</th>
                            <th style='font-weight:bold;border:2px solid #f00;'> Boleta </th>
                            <th style='font-weight:bold;border:2px solid #f00;'>monto <br>(Bs)</th>
                        </tr>
                    </thead>
                            <tbody>
                            @foreach($procesos as $proceso)
                                <tr >
                                
                                <td style='border:4px solid #f00;'> {{$proceso->number_row}}</td>
                                <td colspan="7" style='border:4px solid #f00;'>{{$proceso-> exportador }}</td>
                                <td style='border:4px solid #f00;'>{{$proceso-> n}}</td> 
                                <td style='border:4px solid #f00;'>{{$proceso-> lote}}</td>
                                <td style='border:4px solid #f00;'>{{$proceso-> sacos }}</td>
                                <td style='border:4px solid #f00;'>{{$proceso-> volumen}}</td>
                                <td style='border:4px solid #f00;'>{{$proceso->tc }}</td>
                                <td style='border:4px solid #f00;'>{{$proceso->p_u }}</td>
                                <td style='border:4px solid #f00;'>{{$proceso-> fecha_emision}}</td>
                                <td style='border:4px solid #f00;'>{{$proceso-> nro_recibo}}</td>
                                <td style='border:4px solid #f00;'>{{$proceso->num_deposito }}</td>
                                <td style='border:4px solid #f00;'>{{$proceso-> monto}}</td>
                                </tr>
                            @endforeach
                            <tr>
                              
                        
                              @foreach ($cierres as $cierre)
                                          
                              
                                
                              <td colspan="2" style='border:4px solid #f00;'  >TOTAL GENERAL </td>
                              <td colspan="6"></td>
                              <td></td>
                              <td></td>
                              <td  style='border:4px solid #f00;' >  {{$cierre->sacos}}</td>
                              <td  style='border:4px solid #f00; '> {{$cierre->volumen}}</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
  
                              <td style='border:4px solid #f00; '>  {{$cierre->total}}</td>
                        </tr>   
                           @endforeach
                            </tbody>
            </table> 

    <br>


<br><br><br><br><br><br><br><br><br><br>

    
    <table>
    <tr> 
      <td colspan="3" rowspan="3" height=30 width=10><img src="img/logo-snv.png" height=110 width=200  ></td>
        <td colspan="12"  rowspan="5"  align="center">
        <div class="city">
            
              <!--  -->
                    <h1 style='font-weight:bold;'>SERVICIO NACIONAL DE VERIFICACION DE <br>  EXPORTACIONES </h1>
                    <h1>UNIDAD OPERATIVA   | EL ALTO</h1>
                    <h1>CIERRE DE VENTAS DE VALORES Y SERVICIOS</h1>
                    <br>
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
                    
                        <td colspan="7" align="center"style='font-weight:bold;'> Nacional :______</td>
                       <td colspan="6" align="center"style='font-weight:bold;'class="default">Periodo: {{$f1}}  al : {{$f2}} </td>
                       
                   </tr>
            
               <tbody>
        </table>

        
            <table   >
                            
                    <thead>
                        <tr >
                                <th colspan="10" style='font-weight:bold;border:2px solid #f00;'>VALOR/SERVICIO</th>
                                <th colspan="2"style='font-weight:bold;border:2px solid #f00;'>CTD</th>
                                <th colspan="2"style='font-weight:bold;border:2px solid #f00;'>DEL</th>
                                <th colspan="2" style='font-weight:bold;border:2px solid #f00;'>AL</th>
                                <th colspan="2" style='font-weight:bold;border:2px solid #f00;'>TOTAL</th>
                        </tr>
                    </thead>
                            <tbody>
                                @foreach ($cierres as $cierre)
                                <tr>
                                
                                    
                                                
                                    <td   colspan="10"style='border:4px solid #f00;'  >O.I.C. |  Certificado de origen de cafe</td>
                                    <td colspan="2" style='border:4px solid #f00;' >  {{$cierre->ctd}}</td>
                                    <td colspan="2" style='border:4px solid #f00; '> {{$cierre->del}}</td>
                                    <td colspan="2" style='border:4px solid #f00; '> {{$cierre->al}}</td>
                                    <td colspan="2" style='border:4px solid #f00; '> {{$cierre->total}}</td>
                                </tr>   

                               
                                <tr   style='border:4px solid #f00; '>
                                    <td colspan="10">  TOTALES(recibo : {{$cierre->ini}}  al {{$cierre->fin}}  )   </td>
                                    <td colspan="2"> </td>
                                    <td colspan="2">{{$cierre->ctd}}</td>
                                    <td colspan="2"></td>
                                    <td colspan="2">{{$cierre->total}}</td>
                                </tr>
                           @endforeach
                            </tbody>
            </table> 

    

</body>
</html>
