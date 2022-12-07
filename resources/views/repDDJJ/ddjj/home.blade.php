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
          <td style="text-align:center; font-size: 15px;">REPORTES DE DECLARACION </td>
          <td style="text-align:right"><img class="taypi-snv" src="img/taypi-snv.png" alt="taypisnv"></td>
      </tr>
      <tr>
          <td style="text-align:left"></td>
          <td style="text-align:center; font-size: 15px;">JURADA DE ORIGEN</td>
  
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
   



    <form  action="{{route('repDDJJ.ddjj')}}" method ="POST">
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
                      <tr BGCOLOR="#99A3A4 ">
                                        <th class="table_cabecera1">No. </th>
                                        <th class="table_cabecera1">RUEX</th>
                                        <th class="table_cabecera1">Nombre o Razon Social</th>
                                        <th class="table_cabecera1">Departamento de domicilio fiscal de la Empresa</th>
                                        <th class="table_cabecera1">Categoria Empresa</th>
                                        <th class="table_cabecera1">Acuerdo o Regimen Preferencial</th>
                                        <th class="table_cabecera1">Descripcion Comercial</th>
                                        <th class="table_cabecera1">Clasificacion NANDINA</th>
                                        <th class="table_cabecera1">Clacificacion NALANDISA </th>
                                        <th class="table_cabecera1">Criterio  de Origen</th>
                                        <th class="table_cabecera1">No. Declaracion Jurada</th>
                                        <th class="table_cabecera1"> Fecha de Approbacion</th>
                                        <th class="table_cabecera1">Fecha de Vencimiento</th>
                                        <th class="table_cabecera1">Fecha de Baja</th>
                                        <th class="table_cabecera1">Certificador</th>
                                        <th class="table_cabecera1">Observaciones</th>
                                        <th BGCOLOR="#FCF102" class="table_cabecera1">Mes</th>
                                        <th BGCOLOR="#FCF102"class="table_cabecera1">Ano</th>
                                        <th BGCOLOR="#FCF102" class="table_cabecera1">Regional</th>
                                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($procesos as $proceso)
                      
                           <tr  class="table_texto4"> 
                                    <td class="table_texto4">{{$proceso-> number_row}}</td>
                                    <td class="table_texto4">{{$proceso->ruex}}</td>
                                    <td class="table_texto4">{{$proceso->razon_social}}</td>
                                    <td class="table_texto4">{{$proceso->departamento}}</td>
                                    <td class="table_texto4">{{$proceso-> descripcion_categoria}}</td>
                                    <td class="table_texto4">{{$proceso->acuerdo}}</td>
                                    <td class="table_texto4">{{$proceso->denominacion_comercial}}</td>
                                    <td class="table_texto4">{{$proceso->nandina}}</td>
                                    <td class="table_texto4">{{$proceso->naladisa}}</td>
                                    <td class="table_texto4">{{$proceso->criterio}}</td>
                                    <td class="table_texto4">{{$proceso->id_acuerdo}}</td>
                                    <td class="table_texto4">{{$proceso->fecha_aprobacion}}</td>
                                    <td class="table_texto4">{{$proceso->fecha_vencimiento}}</td>
                                    <td class="table_texto4">{{$proceso->fecha_baja}}</td>
                                    <td class="table_texto4">{{$proceso->certificador}}</td>
                                    <td class="table_texto4">{{$proceso->observaciones}}</td>
                                    <td class="table_texto4">{{$proceso->mes}}</td>
                                    <td class="table_texto4">{{$proceso->anio}}</td>
                                    <td class="table_texto4">{{$proceso->mes}}</td>
                              </tr>
                      @endforeach             
                    </tbody>
                  </table>
                </div>

     </table>
    </div>
</body>
</html>