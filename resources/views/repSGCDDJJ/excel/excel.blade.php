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
          <td style="text-align:center; font-size: 15px;">REGISTRO</td>
          <td style="text-align:right"><img class="taypi-snv" src="img/taypi-snv.png" alt="taypisnv"></td>
      </tr>
      <tr>
          <td style="text-align:left"></td>
          <td style="text-align:center; font-size: 15px;"> DE SOLICITUDES  DDJJ</td>
  
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
   



    <form  action="{{route('repSGCDDJJ.excel')}}" method ="POST">
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
                        <th BGCOLOR="YELLOW" class="table_cabecera1" colspan="4"  color="red"> <font color="red">RESULTADOS</font></th>
                       
                    </tr>
                      <tr BGCOLOR="#CFD8DC">
                                        <th class="table_cabecera1"> <font color="red">No.</font> </th>
                                        <th class="table_cabecera1">Nombre o Razon Social</th>
                                        <th class="table_cabecera1">NIT o C.I.</th>
                                        <th class="table_cabecera1">RUEX</th>
                                        <th class="table_cabecera1"> <font color="red">Resepcion Solicitud  <br> Fecha y Hora</font> </th>
                                        <th class="table_cabecera1">Aprobado o Rechazado</th>
                                        <th class="table_cabecera1">Certificador</th>
                                        <th class="table_cabecera1"> <font color="red">Revicion Solicitud <br>FEcha y Hora</font></th>
                                        <th class="table_cabecera1">Observacion</th>
                                        <th class="table_cabecera1">Regional</th>
                                        <th  BGCOLOR="YELLOW"class="table_cabecera1"> <font color="red">Mes</font></th>
                                        <th  BGCOLOR="YELLOW" class="table_cabecera1"> <font color="red">Año</font></th>
                                        <th  BGCOLOR="YELLOW" class="table_cabecera1"><font color="red">Horas</font></th>
                                        <th  BGCOLOR="YELLOW" class="table_cabecera1"><font color="red">En Plazo</font></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($procesos as $proceso)
                      
                           <tr  class="table_texto4"> 
                              <td class="table_texto4">{{$proceso->number_row}}</td>
                                   <td class="table_texto4">{{$proceso->razon_social}}</td>
                                   <td class="table_texto4">{{$proceso->nit}}</td>
                                   <td class="table_texto4">{{$proceso->ruex}}</td>
                                   <td class="table_texto4">{{$proceso->fecha_registro}}</td>
                                   <td class="table_texto4">{{$proceso->estado}}</td>
                                   <td class="table_texto4">{{$proceso->certificador}}</td>
                                   <td class="table_texto4">{{$proceso->fecha_asignacion}}</td>
                                   <td class="table_texto4">{{$proceso->observaciones}}</td>
                                   <td class="table_texto4">{{$proceso->regional}}</td>
                                   <td class="table_texto4">{{$proceso->mes}}</td>
                                   <td class="table_texto4">{{$proceso->anio}}</td>
                                   <td class="table_texto4">{{$proceso->horas}}</td>
                                   <td class="table_texto4">{{$proceso->lapso}}</td>
                              </tr>
                      @endforeach             
                    </tbody>
                  </table>
                </div>

     </table>
    </div>
</body>
</html>