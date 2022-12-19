<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
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
        .table_texto4 {
            font-size: 9px;
            border: 1px solid;             
        }
      
    </style>
    
<table class="table1">
   <tr>
          <td style="text-align:left"><img class="logo-snv" src="img/logo-snv.png" alt="logosnv"></td>
          <td style="text-align:center; font-size: 15px;">REPORTES DE EMISION DE CERTIFICADOS DE ORIGEN </td>
          <td style="text-align:right"><img class="taypi-snv" src="img/taypi-snv.png" alt="taypisnv"></td>
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
            <td class="table_texto1"> Corrersponde  a :       Nacional :______</td>
            <td class="table_texto1"><font color="red">Periodo: {{$f1}}            al : {{$f2}}    </font> </td>
        </tr>                   
       </table>
       <br><br>
                <!--Fin Busqueda por fechas-->
                
       <div style="text-align:center; font-size: 13px;">
         <div class="table-responsive">
           <table id="procesos" class="table4">
             <thead class="thead-dark">
             <tr BGCOLOR="#99A3A4 " >
             <th class="table_cabecera1">No. </th>
                <th class="table_cabecera1">No. <br>Correlativo de  C.O.</th>
                <th class="table_cabecera1">Fecha Emision</th>
                <th class="table_cabecera1">No.Control</th>
                <th class="table_cabecera1">Tipo C.O.</th>
                <th class="table_cabecera1">Acuerdo o <br> Regimen Preferencial</th>
                <th class="table_cabecera1">Clasificacion Arancelaria </th>
                <th class="table_cabecera1">DEscripcion Comercial</th>
                <th class="table_cabecera1">Valor FOB ($sus)</th>
                <th class="table_cabecera1"> Peso Neto (Kg)</th>
                <th class="table_cabecera1">No.Factura Comercial</th>
                <th class="table_cabecera1">Criterio de Origen</th>
                <th class="table_cabecera1">RUEX</th>
                <th class="table_cabecera1">No. DDJJ</th>
                <th class="table_cabecera1"> Nombre o Razon Social</th>
                <th class="table_cabecera1">Categoria Empresa</th>
                <th class="table_cabecera1"> Pais de Destino</th>
                <th class="table_cabecera1">Certificador Origen</th>
                <th class="table_cabecera1">Tipo de Emision</th>
                <th class="table_cabecera1">Observaciones</th>
                <th BGCOLOR="#FCF102" class="table_cabecera1">Regional</th>
                <th BGCOLOR="#FCF102" class="table_cabecera1">Mes</th>
                <th BGCOLOR="#FCF102"class="table_cabecera1">Ano</th>                      
               </tr>
            </thead>
            <tbody>
            @foreach($procesos as $proceso)   
               <tr  class="table_texto4"> 
                  <td class="table_texto4">{{$proceso-> number_row}}</td>
                  <td class="table_texto4">{{$proceso->nro_emision}}</td>
                  <td class="table_texto4">{{$proceso->fecha_emision}}</td>
                  <td class="table_texto4">{{$proceso->nro_control}}</td>
                  <td class="table_texto4">{{$proceso->tipo_co}}</td>
                  <td class="table_texto4">{{$proceso->acuerdo}}</td>
                  <td class="table_texto4">{{$proceso->cod_arancelario}}</td>
                  <td class="table_texto4">{{$proceso->denominacion_mercaderia}}</td>
                  <td class="table_texto4">{{$proceso->valor_fob_total}}</td>
                  <td class="table_texto4">{{$proceso->peso_neto}}</td>
                  <td class="table_texto4">{{$proceso->num_factura}}</td>
                  <td class="table_texto4">{{$proceso->criterio}}</td>
                  <td class="table_texto4">{{$proceso->ruex}}</td>
                  <td class="table_texto4">{{$proceso->num_ddjj}}</td>
                  <td class="table_texto4">{{$proceso->razon_social}}</td>
                  <td class="table_texto4">{{$proceso->descripcion_categoria}}</td>
                  <td class="table_texto4">{{$proceso->pais_destino}}</td>
                  <td class="table_texto4">{{$proceso->certificador}}</td>
                  <td class="table_texto4">{{$proceso->descripcion_co_tipo_emision}}</td>
                  <td class="table_texto4">{{$proceso->observaciones}}</td>
                  <td class="table_texto4">{{$proceso->regional}}</td>
                  <td class="table_texto4">{{$proceso->mes}}</td>
                  <td class="table_texto4">{{$proceso->year}}</td>
              </tr>
              @endforeach             
            </tbody>
         </table>
       </div>
    </div>
</body>
</html>