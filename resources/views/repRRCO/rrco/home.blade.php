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
   



    <form  action="{{route('repRRCO.rrco')}}" method ="POST">
      @csrf
      <br>
      <div class="container">
          <div class="row">
              <div class="container-fluid">
                  <div class="form-group row">

                          <div class="col-sm-3">

                            <label for="date" class="col-form-label col-sm-2">Fecha Inicio</label>
                                <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>

                              <label for="date" class="col-form-label col-sm-2">Fecha Final</label>
                                  <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
     
                                      <button type="submit" class="btn" name="search" title="Search">buscar</button>
                                      
                            </div>
                  </div>
              </div>
          </div>
      </div>
      <br>
     </form>
     
  
                <!--Fin Busqueda por fechas-->
                
              <div style="text-align:center; font-size: 13px;">
                <div class="table-responsive">
                  <table id="procesos" class="table4">
                    <thead class="thead-dark">
                      <tr BGCOLOR="YELLOW">
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
                    <tbody>
                      @foreach($procesos as $proceso)
                      
                           <tr  class="table_texto4"> 
                                   <td class="table_texto4">{{$proceso->ruex}}</td>
                                    <td class="table_texto4">{{$proceso->co_correlativo}}</td>
                                    <td class="table_texto4">{{$proceso->fecha_emision}}</td>
                                    <td class="table_texto4">{{$proceso->nro_control}}</td>
                                    <td class="table_texto4">{{$proceso->tico_co}}</td>
                                    <td class="table_texto4">{{$proceso->ac_rp}}</td>
                                    <td class="table_texto4">{{$proceso->cla_arancelaria}}</td>
                                    <td class="table_texto4">{{$proceso->descripcion_comercial}}</td>
                                    <td class="table_texto4">{{$proceso->valor_fob}}</td>
                                    <td class="table_texto4">{{$proceso->peso_neto}}</td>
                                    <td class="table_texto4">{{$proceso->num_factura}}</td>
                                    <td class="table_texto4">{{$proceso->criterio}}</td>
                                    <td class="table_texto4">{{$proceso->ruex}}</td>
                                    <td class="table_texto4">{{$proceso->numero_ddjj}}</td>
                                    <td class="table_texto4">{{$proceso->numero_ddjj_old}}</td>
                                    <td class="table_texto4">{{$proceso->razon_social}}</td>
                                    <td class="table_texto4">{{$proceso->descripcion_categoria}}</td>
                                    <td class="table_texto4">{{$proceso->pais_destino}}</td>
                                    <td class="table_texto4">{{$proceso->descripcion_co_tipo_emision}}</td>
                                    <td class="table_texto4">{{$proceso->observaciones_grals}}</td>
                                     <td>  jjjjjjjj</td>
                                    <td class="table_texto4">{{$proceso->mes}}</td>
                                    <td class="table_texto4">{{$proceso->anio}}</td>
                              </tr>
                      @endforeach             
                    </tbody>
                  </table>
                </div>

     </table>
    </div>
</body>
</html>