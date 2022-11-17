<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
        .logo-snv {            
            max-width: 100px;
            max-height: 50px;            
        }
        .taypi-snv {            
            max-width: 100px;
            max-height: 50px;            
        }
        .table1 {
            width: 100%;
        }
        .table2 {
            width: 100%;
            border: 2px solid;
        }
        .table3 {
            width: 100%;
        }
        .table4 {
            width: 100%;
            border-collapse: collapse;         
        }
        .table_cabecera1 {
            font-size: 9px;
            text-align: center;
            border: 1px solid;             
        }
        .table_cabecera2 {
            font-size: 6px;
            text-align: center;
            border: 1px solid;             
        }
        .table_texto1 {
            font-size: 12px;
            text-align: left;            
        }
        .table_texto2 {
            font-size: 10px;
            text-align: center;
            border: 1px solid; 
            font-weight: bold;       
        }
        .table_texto3 {
            font-size: 6px;
            text-align: center;
            border: 1px solid;             
        }
        .table_texto4 {
            font-size: 9px;
            text-align: left;
            border: 1px solid;             
        }
        .table_texto5 {
            font-size: 9px;
            text-align: center;
            border: 1px solid;             
        }
        .table_texto6 {
            font-size: 9px;
            text-align: left;
            border: 1px solid;
            width: 50%;
        }
        .table_texto_numeral {
            font-size: 9px;
            text-align: right;
            border: 1px solid; 
        }
    </style>
</head>

<body>
    <div>
                <table class="table1">
                    <tr>
                        <td style="text-align:left"><img class="logo-snv" src="img/logo-snv.png" alt="logosnv"></td>
                        <td style="text-align:center; font-size: 15px;">REPORTES TAYPI</td>
                        <td style="text-align:right"><img class="taypi-snv" src="img/taypi-snv.png" alt="taypisnv"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left"></td>
                        <td style="text-align:center; font-size: 13px;">LISTADO DE  DECLARACIONES JURADAS - EXPORTADOR</td>
                
                    </tr>
                    <tr>
                        <td style="text-align:left">  </td>
                        <td style="text-align:center; font-size: 13px;">{{ date('d-m-Y h:i:s', strtotime(now())) }}
                        <td class="px-3 py-2"> 
                        </td></td>
                    </tr> 
                </table>

        <br>
        <div style="border:1px solid; ">
        <br>
        <table class="table1">
                

                         @foreach($empresas as $empresa)
                            <tr>
                                <td class="table_texto1">1. Razón Social:</td>
                                <td class="table_texto1"> {{$empresa->razon_social}}</td> 
                                <td class="table_texto1">2. Nombre comercial:</td>
                                <td class="table_texto1"> {{$empresa->nombre_comercial}}</td> 
                            </tr>
                        
                            <tr>
                                <td class="table_texto1">3. Telefono:</td>
                                <td class="table_texto1"> {{$empresa->telefono}}</td> 
                                <td class="table_texto1">4. Celular:</td>
                                <td class="table_texto1"> {{$empresa->celular}}</td> 
                            
                            </tr>
                            <tr>
                                <td class="table_texto1">5. Email:</td>
                                <td class="table_texto1"> {{$empresa->email}}</td> 
                                <td class="table_texto1">6. nit:</td>
                                <td class="table_texto1"> {{$empresa->nit}}</td> 
                            
                            </tr>
                        @endforeach
                   </table>
  
     
     <br>
                    <div style="text-align:center; font-size: 13px;">LISTADO DE DECLARACION JURADA :::  HABILITADAS</div>


                            <table class="table4" >
                            
                                <thead>
                                    <tr>
                                        <th class="table_cabecera1">N* </th>
                                        <th class="table_cabecera1">NUMERO DDJJ</th>
                                        <th class="table_cabecera1">ACUERDO</th>
                                        <th class="table_cabecera1">ESTADO</th>
                                        <th class="table_cabecera1">FECHA APROBACION</th>
                                        <th class="table_cabecera1">FECHA VENCIMIENTO</th>
                                        
                                    </tr>
                                </thead>    
                                        @foreach($ddjjs as $ddjj)   
                                                    <tr>
                                                        
                                                        <td class="table_texto4">{{$ddjj-> number_row}}</td>
                                                        <td class="table_texto4"> {{$ddjj->numero_ddjj}}</td>
                                                        <td class="table_texto4">{{$ddjj->acuerdo_sigla}}</td>
                                                        <td class="table_texto4">{{$ddjj->estado_descripcion}}</td>
                                                        <td class="table_texto4">{{$ddjj->fecha_aprobacion}}</td>
                                                        <td class="table_texto4">{{$ddjj->fecha_vencimiento}}</td>
                                                    </tr>
                                        @endforeach
                            </table>
                    
                    
                     <br>
                    <div style="text-align:center; font-size: 13px;">LISTADO DE DECLARACION JURADA :::  BAJAS</div>


                            <table class="table4" >
                            
                                <thead>
                                    <tr>
                                        <th class="table_cabecera1">N* </th>
                                        <th class="table_cabecera1">NUMERO DDJJ</th>
                                        <th class="table_cabecera1">ACUERDO</th>
                                        <th class="table_cabecera1">ESTADO</th>
                                        <th class="table_cabecera1">FECHA BAJA</th>
                                        
                                    </tr>
                                </thead>    
                                        @foreach($bajas as $baja)   
                                                    <tr>
                                                        
                                                        <td class="table_texto4">{{$baja-> number_row}}</td>
                                                        <td class="table_texto4"> {{$baja->numero_ddjj}}</td>
                                                        <td class="table_texto4">{{$baja->acuerdo_sigla}}</td>
                                                        <td class="table_texto4">{{$baja->estado_descripcion}}</td>
                                                        <td class="table_texto4">{{$baja->fecha_baja}}</td>
                                                    </tr>
                                        @endforeach
                            </table>
                            </table>
                     </div>
                     </table>
                     </div>
        </div>
</body>

</html>