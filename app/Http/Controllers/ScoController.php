<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Exports\SCOExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empresas; 
use App\Models\Ddjjs;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Carbon\Carbon;
class ScoController extends Controller
{
    
 
       
        public function export(Request $request) 
        {  
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
       return Excel::download(new SCOExport(), 'seguimiento_certificado.xlsx');
                
        }
        public function get(){
            $proceso="SELECT row_number() OVER () as number_row,
            co.nro_control, acu.sigla as acuerdo, r.ruex, e.razon_social, 
            cosol.fecha_registro, cosol.fecha_asignacion,  
            cote.descripcion_co_tipo_emision as tipo_emision, cosolest.descripcion_co_solicitud_estado as estado_solicitud_digital,
            cosol.fecha_revision, reg.ciudad as regional, EXTRACT(MONTH FROM cosol.fecha_revision) as mes, to_char(cosol.fecha_revision, 'YYYY') as year
        FROM co_solicituds cosol
        LEFT JOIN co_solicitud_estados cosolest ON cosolest.id_co_solicitud_estado = cosol.id_co_solicitud_estado
        LEFT JOIN regionals reg ON reg.id_regional = cosol.id_regional
        LEFT JOIN cos co ON co.id_co = cosol.id_co
        LEFT JOIN co_tipo_emisions cote ON cote.id_co_tipo_emision = co.id_co_tipo_emision
        LEFT JOIN acuerdos acu ON acu.id_acuerdo = co.id_acuerdo
        LEFT JOIN empresas e ON e.id_empresa = co.id_empresa
        LEFT JOIN ruexs r ON r.id_empresa = e.id_empresa
        LEFT JOIN personas p ON p.id_persona = cosol.id_revisor
        WHERE 
           r.id_ruex = (select max(id_ruex) from ruexs where id_empresa = e.id_empresa)
           ";
            
            $procesos=DB::select($proceso);
            $data = ['procesos' => $procesos];
            
            return view('repSCO.excel.excel', $data);
        }
        //buscar por rango de fechas
        public function postProcesos(Request $request){
            
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
            return Excel::download(new SCOExport($request->fromDate, $request->toDate), 'seguimiento_certificado_origen.xlsx');
    
         }
        
        
        
public function getProcesos(){
    $proceso="SELECT row_number() OVER () as number_row,
    co.nro_control, acu.sigla as acuerdo, r.ruex, e.razon_social, 
    cosol.fecha_registro, cosol.fecha_asignacion,  
    cote.descripcion_co_tipo_emision as tipo_emision, cosolest.descripcion_co_solicitud_estado as estado_solicitud_digital,
    cosol.fecha_revision, reg.ciudad as regional, EXTRACT(MONTH FROM cosol.fecha_revision) as mes, to_char(cosol.fecha_revision, 'YYYY') as year
FROM co_solicituds cosol
LEFT JOIN co_solicitud_estados cosolest ON cosolest.id_co_solicitud_estado = cosol.id_co_solicitud_estado
LEFT JOIN regionals reg ON reg.id_regional = cosol.id_regional
LEFT JOIN cos co ON co.id_co = cosol.id_co
LEFT JOIN co_tipo_emisions cote ON cote.id_co_tipo_emision = co.id_co_tipo_emision
LEFT JOIN acuerdos acu ON acu.id_acuerdo = co.id_acuerdo
LEFT JOIN empresas e ON e.id_empresa = co.id_empresa
LEFT JOIN ruexs r ON r.id_empresa = e.id_empresa
LEFT JOIN personas p ON p.id_persona = cosol.id_revisor
WHERE 
   r.id_ruex = (select max(id_ruex) from ruexs where id_empresa = e.id_empresa)
   ";
    
    $procesos=DB::select($proceso);
    $data = ['procesos' => $procesos];
    
    return view('repSCO.sco.home', $data);
}
//buscar por rango de fechas
public function postProcesosbuscar(Request $request){
    
    $fronDate = $request->input('fromDate');
    $toDate = $request->input('toDate');

    $f1=$fronDate ;
   $f2= $toDate;
    
  


$proceso=" SELECT row_number() OVER () as number_row,
co.nro_control, acu.sigla as acuerdo, r.ruex, e.razon_social, 
cosol.fecha_registro, cosol.fecha_asignacion,  
cote.descripcion_co_tipo_emision as tipo_emision, cosolest.descripcion_co_solicitud_estado as estado_solicitud_digital,
cosol.fecha_revision, reg.ciudad as regional, EXTRACT(MONTH FROM cosol.fecha_revision) as mes, to_char(cosol.fecha_revision, 'YYYY') as year
FROM co_solicituds cosol
LEFT JOIN co_solicitud_estados cosolest ON cosolest.id_co_solicitud_estado = cosol.id_co_solicitud_estado
LEFT JOIN regionals reg ON reg.id_regional = cosol.id_regional
LEFT JOIN cos co ON co.id_co = cosol.id_co
LEFT JOIN co_tipo_emisions cote ON cote.id_co_tipo_emision = co.id_co_tipo_emision
LEFT JOIN acuerdos acu ON acu.id_acuerdo = co.id_acuerdo
LEFT JOIN empresas e ON e.id_empresa = co.id_empresa
LEFT JOIN ruexs r ON r.id_empresa = e.id_empresa
LEFT JOIN personas p ON p.id_persona = cosol.id_revisor
WHERE 
r.id_ruex = (select max(id_ruex) from ruexs where id_empresa = e.id_empresa)
AND cosol.fecha_registro >= '$fronDate'
  and  cosol.fecha_registro <= '$toDate' ";

$procesos=DB::select($proceso);
    //return View('repSCO.pdf.home', compact('procesos','f1','f2'));

   return \PDF::loadView('repSCO.pdf.home', compact('procesos','f1','f2'))
          ->setPaper('a3', 'landscape')
          ->download('filtrado.pdf');
   
 }



   
}


        
        
    