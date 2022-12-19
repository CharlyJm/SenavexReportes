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
          <td style="text-align:center; font-size: 15px;">VENTAS DE CERTIFICADOS O.I.C </td>
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
        <form  action="{{route('repVOIC.excel')}}" method ="POST">
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
                        <button type="submit" class="btn" name="search" title="Search" id="home" >DESCARGAR</button>
                        <button type="submit" class="btn" name="search" title="Search"id="cierre">DESCARGAR</button>                                    
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
                 <tr BGCOLOR="#909497  ">
                    <th class="table_cabecera1">No </th>
                    <th class="table_cabecera1">Exportador</th>
                    <th class="table_cabecera1">N*</th>
                    <th class="table_cabecera1">Lote</th>
                    <th class="table_cabecera1">Sacos <br>(60 Kg)</th>
                    <th class="table_cabecera1">Volumen <br>(Kg)</th>
                    <th class="table_cabecera1">T/C</th> 
                    <th class="table_cabecera1">P.U. <br> ($us)</th>
                    <th class="table_cabecera1">fecha</th>
                    <th class="table_cabecera1">Recibo Oficial</th>
                    <th class="table_cabecera1"> Boleta </th>
                    <th class="table_cabecera1">monto</th>
                 </tr>
               </thead>
               <tbody>
               @foreach($procesos as $proceso)     
                  <tr  class="table_texto4"> 
                           <td class="table_texto4">{{$proceso->number_row}}</td>
                           <td class="table_texto4">{{$proceso-> exportador }}</td>
                           <td class="table_texto4">{{$proceso-> n}}</td> 
                           <td class="table_texto4">{{$proceso-> lote}}</td>
                           <td class="table_texto4">{{$proceso-> sacos }}</td>
                           <td class="table_texto4">{{$proceso-> volumen}}</td>
                           <td class="table_texto4">{{$proceso->tc }}</td>
                           <td class="table_texto4">{{$proceso->p_u }}</td>
                           <td class="table_texto4">{{$proceso-> fecha_emision}}</td>
                           <td class="table_texto4">{{$proceso-> nro_recibo}}</td>
                           <td class="table_texto4">{{$proceso->num_deposito }}</td>
                           <td class="table_texto4">{{$proceso-> monto}}</td>     
                     </tr>
                      @endforeach             
              </tbody>
            </table>
          </div>
     </table>
    </div>
</body>
</html>