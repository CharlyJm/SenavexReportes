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
                        <td style="text-align:center; font-size: 15px;">REPORTES DE EMISION</td>
                        <td style="text-align:right"><img class="taypi-snv" src="img/taypi-snv.png" alt="taypisnv"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left"></td>
                        <td style="text-align:center; font-size: 15px;">DE CERTIFICADOS DE ORIGEN</td>
                
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
                

                            <tr>
                                <td class="table_texto1">Rango de fechas:_______     </td>
                                <td class="table_texto1">RRCO:______</td>
                            </tr>
                        
                            
                   </table>
  
     
     <br>
                    <div style="text-align:center; font-size: 13px;"></div>


                            <table class="table4" >
                            
                                <thead>
                                    <tr>
                                        <th class="table_cabecera1">No. </th>
                                        <th class="table_cabecera1">No. CORRELATIVO DE C.O.</th>
                                        <th class="table_cabecera1">FECHA EMISION</th>
                                        <th class="table_cabecera1">No. CONTROL</th>
                                        <th class="table_cabecera1">TIPO C.O.</th>
                                        <th class="table_cabecera1">ACUERDO O REGIMEN PREFERENCIAL</th>
                                        <th class="table_cabecera1">CLASIFICACION ARANCELES</th>
                                        <th class="table_cabecera1">DESCRIPCION COMERCIAL</th>
                                        <th class="table_cabecera1">VALOR FOB ($us)</th>
                                        <th class="table_cabecera1">PESO NETO(Kg)</th>
                                        <th class="table_cabecera1">No.FACTURACION COMERCIAL</th>
                                        <th class="table_cabecera1">CRITERIO DE ORIGEN</th>
                                        <th class="table_cabecera1">RUEX</th>
                                        <th class="table_cabecera1">No.DDJJ</th>
                                        <th class="table_cabecera1">NOMBRE 0 RAZON SOCIAL</th>
                                        <th class="table_cabecera1">CATEGORIA EMPRESA</th>
                                        <th class="table_cabecera1">PAIS DESTINO</th>
                                        <th class="table_cabecera1">CERTIFICADOR ORIGEN</th>
                                        <th class="table_cabecera1">TIPO DE EMICION</th>
                                        <th class="table_cabecera1">OBSERVACION</th>
                                        <th class="table_cabecera1">REGIONAL</th>
                                        <th class="table_cabecera1">MES</th>
                                        <th class="table_cabecera1">AÑO</th>
                                        
                                    </tr>
                                    
                                </thead>    
                                   @foreach($rrcos as $rrco)
                                    <tr>
                                    <td class="table_texto4">{{$rrco->row_number}}</td>
                                    <td class="table_texto4">{{$rrco->correlativo_co}}</td>
                                    <td class="table_texto4">{{$rrco->fecha_emision}}</td>
                                    <td class="table_texto4">{{$rrco->n_control}}</td>
                                    <td class="table_texto4">{{$rrco->tipo_co}}</td>
                                    <td class="table_texto4">{{$rrco->ac_rp}}</td>
                                    <td class="table_texto4">{{$rrco->cla_arancelaria}}</td>
                                    <td class="table_texto4">{{$rrco->desc_comercial}}</td>
                                    <td class="table_texto4">{{$rrco->valor_fob}}</td>
                                    <td class="table_texto4">{{$rrco->peso_neto}}</td>
                                    <td class="table_texto4">{{$rrco->n_factura_comercial}}</td>
                                    <td class="table_texto4">{{$rrco->criterio_origen}}</td>
                                    <td class="table_texto4">{{$rrco->ruex}}</td>
                                    <td class="table_texto4">{{$rrco->n_ddjj}}</td>
                                    <td class="table_texto4">{{$rrco->razon_social}}</td>
                                    <td class="table_texto4">{{$rrco->categoria}}</td>
                                    <td class="table_texto4">{{$rrco->pais_destino}}</td>
                                    <td class="table_texto4">{{$rrco->certificador}}</td>
                                    <td class="table_texto4">{{$rrco->emision}}</td>
                                    <td class="table_texto4">{{$rrco->observaciones}}</td>
                                    <td class="table_texto4">{{$rrco->regional}}</td>
                                    <td class="table_texto4">{{$rrco->mes}}</td>
                                    <td class="table_texto4">{{$rrco->anio}}</td>
                                    
                                    </tr>
                                   
                                    @endforeach 
                            </table>
                    
                    
                     <br>
                   
                     </table>
                     </div>
        </div>
</body>

</html>