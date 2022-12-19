<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Exports\RACOExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empresas; 
use App\Models\Ddjjs;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Carbon\Carbon;

class RacoController extends Controller
{
    


        public function get (){
            $proceso="SELECT row_number() OVER () as number_row,
            (CASE WHEN co.id_co_estado = 5 THEN cosol.fecha_revision ELSE co.fecha_anulacion END) as fecha_anulacion, 
            co.nro_control, cot.descripcion_co_tipo, ru.ruex, emp.razon_social, reg.ciudad,
            (CASE WHEN co.id_co_estado = 5 THEN 'Antes de la Emisión' ELSE 'Posterior a la Emisión' END) as tipo_anulacion,
            coe.descripcion_co_estado as tipo_anulacion_2,
            (CASE WHEN co.id_co_estado = 5 THEN cosol.solicitud_observaciones ELSE co.motivo_anulacion END) as observaciones,
            EXTRACT(MONTH FROM cosol.fecha_revision) as mes, to_char(cosol.fecha_revision, 'YYYY') as year,
            CONCAT(rev.nombres, ' ', rev.primer_apellido, ' ', rev.segundo_apellido) as certificador 
      FROM cos co
      LEFT JOIN co_tipos cot ON cot.id_co_tipo = co.id_co_tipo
      LEFT JOIN co_estados coe ON coe.id_co_estado = co.id_co_estado
      LEFT JOIN empresas emp ON emp.id_empresa = co.id_empresa
      LEFT JOIN ruexs ru ON ru.id_empresa = emp.id_empresa
      LEFT JOIN co_solicituds cosol ON cosol.id_co = co.id_co
      LEFT JOIN regionals reg ON reg.id_regional = cosol.id_regional
      LEFT JOIN personas rev ON rev.id_persona = cosol.id_revisor
      WHERE co.id_co_estado in (5,9)
            AND ru.id_ruex = (select max(id_ruex) from ruexs where id_empresa = emp.id_empresa) 
            AND cosol.id_co_solicitud  = (select max(id_co_solicitud) from co_solicituds where id_co = co.id_co)";
            
            $procesos=DB::select($proceso);
            $data = ['procesos' => $procesos];
            
            return view('repRACO.excel.exce', $data);
        }
        //buscar por rango de fechas
        public function postProcesos(Request $request){
            
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');

      return Excel::download(new RACOExport($request->fromDate, $request->toDate), 'Rep_Anulacion_C0.xlsx');
       
         }
        

public function getProcesos(){
    $proceso="
    SELECT row_number() OVER () as number_row,
      (CASE WHEN co.id_co_estado = 5 THEN cosol.fecha_revision ELSE co.fecha_anulacion END) as fecha_anulacion, 
      co.nro_control, cot.descripcion_co_tipo, ru.ruex, emp.razon_social, reg.ciudad,
      (CASE WHEN co.id_co_estado = 5 THEN 'Antes de la Emisión' ELSE 'Posterior a la Emisión' END) as tipo_anulacion,
      coe.descripcion_co_estado as tipo_anulacion_2,
      (CASE WHEN co.id_co_estado = 5 THEN cosol.solicitud_observaciones ELSE co.motivo_anulacion END) as observaciones,
      EXTRACT(MONTH FROM cosol.fecha_revision) as mes, to_char(cosol.fecha_revision, 'YYYY') as year,
      CONCAT(rev.nombres, ' ', rev.primer_apellido, ' ', rev.segundo_apellido) as certificador 
FROM cos co
LEFT JOIN co_tipos cot ON cot.id_co_tipo = co.id_co_tipo
LEFT JOIN co_estados coe ON coe.id_co_estado = co.id_co_estado
LEFT JOIN empresas emp ON emp.id_empresa = co.id_empresa
LEFT JOIN ruexs ru ON ru.id_empresa = emp.id_empresa
LEFT JOIN co_solicituds cosol ON cosol.id_co = co.id_co
LEFT JOIN regionals reg ON reg.id_regional = cosol.id_regional
LEFT JOIN personas rev ON rev.id_persona = cosol.id_revisor
WHERE co.id_co_estado in (5,9)
      AND ru.id_ruex = (select max(id_ruex) from ruexs where id_empresa = emp.id_empresa) 
      AND cosol.id_co_solicitud  = (select max(id_co_solicitud) from co_solicituds where id_co = co.id_co)";
    
    $procesos=DB::select($proceso);
    $data = ['procesos' => $procesos];
    
    return view('repRACO.raco.home', $data);
}
//buscar por rango de fechas
public function postProcesosbuscar(Request $request){
    
    $fronDate = $request->input('fromDate');
    $toDate = $request->input('toDate');

    $f1=$fronDate ;
   $f2= $toDate;
    
  


$proceso=" SELECT row_number() OVER () as number_row,
(CASE WHEN co.id_co_estado = 5 THEN cosol.fecha_revision ELSE co.fecha_anulacion END) as fecha_anulacion, 
co.nro_control, cot.descripcion_co_tipo, ru.ruex, emp.razon_social, reg.ciudad,
(CASE WHEN co.id_co_estado = 5 THEN 'Antes de la Emisión' ELSE 'Posterior a la Emisión' END) as tipo_anulacion,
coe.descripcion_co_estado as tipo_anulacion_2,
(CASE WHEN co.id_co_estado = 5 THEN cosol.solicitud_observaciones ELSE co.motivo_anulacion END) as observaciones,
EXTRACT(MONTH FROM cosol.fecha_revision) as mes, to_char(cosol.fecha_revision, 'YYYY') as year,
CONCAT(rev.nombres, ' ', rev.primer_apellido, ' ', rev.segundo_apellido) as certificador 
FROM cos co
LEFT JOIN co_tipos cot ON cot.id_co_tipo = co.id_co_tipo
LEFT JOIN co_estados coe ON coe.id_co_estado = co.id_co_estado
LEFT JOIN empresas emp ON emp.id_empresa = co.id_empresa
LEFT JOIN ruexs ru ON ru.id_empresa = emp.id_empresa
LEFT JOIN co_solicituds cosol ON cosol.id_co = co.id_co
LEFT JOIN regionals reg ON reg.id_regional = cosol.id_regional
LEFT JOIN personas rev ON rev.id_persona = cosol.id_revisor
WHERE co.id_co_estado in (5,9)
AND ru.id_ruex = (select max(id_ruex) from ruexs where id_empresa = emp.id_empresa) 
AND cosol.id_co_solicitud  = (select max(id_co_solicitud) from co_solicituds where id_co = co.id_co)
and  co.fecha_anulacion >= '$fronDate'
  and   co.fecha_anulacion<= '$toDate' ";  


$procesos=DB::select($proceso);

//   return View('repRACO.pdf.home', ['procesos'=>$procesos,'f1'=>$f1,'f2'=>$f2]);
    return \PDF::loadView('repRACO.pdf.home', compact('procesos','f1','f2'))
           ->setPaper('a3', 'landscape')
          ->download('filtrado.pdf');
   
 }



   
}


        
        
    