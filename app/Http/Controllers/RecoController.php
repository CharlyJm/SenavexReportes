<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Exports\RECOExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empresas; 
use App\Models\Ddjjs;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Carbon\Carbon;


class RecoController extends Controller
{
  
       
        public function export(Request $request) 
        {  
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
       return Excel::download(new RECOExport(), 'Reporte_emicion_certifcado.xlsx');
                
        }

        public function get(){
            $proceso=" SELECT row_number() OVER () as number_row,
            co.nro_emision, co.fecha_emision, co.nro_control, cot.descripcion_co_tipo as tipo_co,
            acu.acuerdo, com.cod_arancelario, com.denominacion_mercaderia, cofc.monto as valor_fob_total,
            com.valor_fob, com.peso_neto, cofc.num_factura, cror.criterio, ru.ruex,
            (CASE WHEN dj.numero_ddjj = 0 THEN dj.numero_ddjj_old ELSE dj.numero_ddjj::varchar END) as num_ddjj, 
            emp.razon_social, emcat.descripcion_categoria, p.pais as pais_destino,
            CONCAT(rev.nombres, ' ', rev.primer_apellido, ' ', rev.segundo_apellido) as certificador, 
            cote.descripcion_co_tipo_emision, cosol.solicitud_observaciones as observaciones,
            reg.ciudad as regional, EXTRACT(MONTH FROM cosol.fecha_revision) as mes, to_char(cosol.fecha_revision, 'YYYY') as year
        FROM cos co
        LEFT JOIN co_factura_comercials cofc ON cofc.id_co = co.id_co
        LEFT JOIN co_tipo_emisions cote ON cote.id_co_tipo_emision = co.id_co_tipo_emision
        LEFT JOIN co_mercaderias com ON com.id_co = co.id_co
        LEFT JOIN co_importadors coimp ON coimp.id_co = co.id_co
        LEFT JOIN co_solicituds cosol ON cosol.id_co = co.id_co
        LEFT JOIN personas rev ON rev.id_persona = cosol.id_revisor
        LEFT JOIN regionals reg ON reg.id_regional = cosol.id_regional
        LEFT JOIN pais p ON p.id_pais = coimp.id_pais
        LEFT JOIN co_tipos cot ON cot.id_co_tipo = co.id_co_tipo
        LEFT JOIN acuerdos acu ON acu.id_acuerdo = co.id_acuerdo
        LEFT JOIN ddjj_origen_criterios cror ON cror.id_ddjj_origen_criterio = com.id_ddjj_origen_criterio
        LEFT JOIN empresas emp ON emp.id_empresa = co.id_empresa
        LEFt JOIN empresa_categorias emcat ON emcat.id_categoria = emp.id_categoria
        LEFT JOIN ruexs ru ON ru.id_empresa = emp.id_empresa
        LEFT JOIN ddjjs dj ON dj.id_ddjj = com.id_ddjj
        WHERE
           co.id_co_estado = 8
           AND cofc.id_co_factura_comercial_tipo = 1
           AND ru.id_ruex = (select max(id_ruex) from ruexs where id_empresa = emp.id_empresa)
           AND cosol.id_co_solicitud  = (select max(id_co_solicitud) from co_solicituds where id_co = co.id_co)
           ORDER BY number_row, co.fecha_emision, co.nro_control ";
            
            $procesos=DB::select($proceso);
            $data = ['procesos' => $procesos];
            
            return view('repRECO.excel.recoexcel', $data);
        }
        //buscar por rango de fechas
        public function postProcesos(Request $request){
            
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
            return Excel::download(new RECOExport($request->fromDate, $request->toDate), 'Reporte_emicion_certifcado.xlsx');
        
        }
        
        

public function getProcesos(){
    $proceso=" SELECT row_number() OVER () as number_row,
    co.nro_emision, co.fecha_emision, co.nro_control, cot.descripcion_co_tipo as tipo_co,
    acu.acuerdo, com.cod_arancelario, com.denominacion_mercaderia, cofc.monto as valor_fob_total,
    com.valor_fob, com.peso_neto, cofc.num_factura, cror.criterio, ru.ruex,
    (CASE WHEN dj.numero_ddjj = 0 THEN dj.numero_ddjj_old ELSE dj.numero_ddjj::varchar END) as num_ddjj, 
    emp.razon_social, emcat.descripcion_categoria, p.pais as pais_destino,
    CONCAT(rev.nombres, ' ', rev.primer_apellido, ' ', rev.segundo_apellido) as certificador, 
    cote.descripcion_co_tipo_emision, cosol.solicitud_observaciones as observaciones,
    reg.ciudad as regional, EXTRACT(MONTH FROM cosol.fecha_revision) as mes, to_char(cosol.fecha_revision, 'YYYY') as year
FROM cos co
LEFT JOIN co_factura_comercials cofc ON cofc.id_co = co.id_co
LEFT JOIN co_tipo_emisions cote ON cote.id_co_tipo_emision = co.id_co_tipo_emision
LEFT JOIN co_mercaderias com ON com.id_co = co.id_co
LEFT JOIN co_importadors coimp ON coimp.id_co = co.id_co
LEFT JOIN co_solicituds cosol ON cosol.id_co = co.id_co
LEFT JOIN personas rev ON rev.id_persona = cosol.id_revisor
LEFT JOIN regionals reg ON reg.id_regional = cosol.id_regional
LEFT JOIN pais p ON p.id_pais = coimp.id_pais
LEFT JOIN co_tipos cot ON cot.id_co_tipo = co.id_co_tipo
LEFT JOIN acuerdos acu ON acu.id_acuerdo = co.id_acuerdo
LEFT JOIN ddjj_origen_criterios cror ON cror.id_ddjj_origen_criterio = com.id_ddjj_origen_criterio
LEFT JOIN empresas emp ON emp.id_empresa = co.id_empresa
LEFt JOIN empresa_categorias emcat ON emcat.id_categoria = emp.id_categoria
LEFT JOIN ruexs ru ON ru.id_empresa = emp.id_empresa
LEFT JOIN ddjjs dj ON dj.id_ddjj = com.id_ddjj
WHERE
   co.id_co_estado = 8
   AND cofc.id_co_factura_comercial_tipo = 1
   AND ru.id_ruex = (select max(id_ruex) from ruexs where id_empresa = emp.id_empresa)
   AND cosol.id_co_solicitud  = (select max(id_co_solicitud) from co_solicituds where id_co = co.id_co)
   ORDER BY number_row, co.fecha_emision, co.nro_control ";
    
    $procesos=DB::select($proceso);
    $data = ['procesos' => $procesos];
    
    return view('repRECO.reco.home', $data);
}
//buscar por rango de fechas
public function postProcesosbuscar(Request $request){
    
    $fronDate = $request->input('fromDate');
    $toDate = $request->input('toDate');

    $f1=$fronDate ;
   $f2= $toDate;
    


$proceso="SELECT row_number() OVER () as number_row,
co.nro_emision, co.fecha_emision, co.nro_control, cot.descripcion_co_tipo as tipo_co,
acu.acuerdo, com.cod_arancelario, com.denominacion_mercaderia, cofc.monto as valor_fob_total,
com.valor_fob, com.peso_neto, cofc.num_factura, cror.criterio, ru.ruex,
(CASE WHEN dj.numero_ddjj = 0 THEN dj.numero_ddjj_old ELSE dj.numero_ddjj::varchar END) as num_ddjj, 
emp.razon_social, emcat.descripcion_categoria, p.pais as pais_destino,
CONCAT(rev.nombres, ' ', rev.primer_apellido, ' ', rev.segundo_apellido) as certificador, 
cote.descripcion_co_tipo_emision, cosol.solicitud_observaciones as observaciones,
reg.ciudad as regional, EXTRACT(MONTH FROM cosol.fecha_revision) as mes, to_char(cosol.fecha_revision, 'YYYY') as year
FROM cos co
LEFT JOIN co_factura_comercials cofc ON cofc.id_co = co.id_co
LEFT JOIN co_tipo_emisions cote ON cote.id_co_tipo_emision = co.id_co_tipo_emision
LEFT JOIN co_mercaderias com ON com.id_co = co.id_co
LEFT JOIN co_importadors coimp ON coimp.id_co = co.id_co
LEFT JOIN co_solicituds cosol ON cosol.id_co = co.id_co
LEFT JOIN personas rev ON rev.id_persona = cosol.id_revisor
LEFT JOIN regionals reg ON reg.id_regional = cosol.id_regional
LEFT JOIN pais p ON p.id_pais = coimp.id_pais
LEFT JOIN co_tipos cot ON cot.id_co_tipo = co.id_co_tipo
LEFT JOIN acuerdos acu ON acu.id_acuerdo = co.id_acuerdo
LEFT JOIN ddjj_origen_criterios cror ON cror.id_ddjj_origen_criterio = com.id_ddjj_origen_criterio
LEFT JOIN empresas emp ON emp.id_empresa = co.id_empresa
LEFt JOIN empresa_categorias emcat ON emcat.id_categoria = emp.id_categoria
LEFT JOIN ruexs ru ON ru.id_empresa = emp.id_empresa
LEFT JOIN ddjjs dj ON dj.id_ddjj = com.id_ddjj
WHERE
co.id_co_estado = 8
AND cofc.id_co_factura_comercial_tipo = 1
AND ru.id_ruex = (select max(id_ruex) from ruexs where id_empresa = emp.id_empresa)
AND cosol.id_co_solicitud  = (select max(id_co_solicitud) from co_solicituds where id_co = co.id_co)
and co.fecha_emision >= '$fronDate'
and co.fecha_emision <= '$toDate'
ORDER BY number_row, co.fecha_emision, co.nro_control
 ";

$procesos=DB::select($proceso);
 //   return View('repRECO.reco.home', compact('procesos','f1','f2'));
     return \PDF::loadView('repRECO.pdf.home', compact('procesos','f1','f2'))
        ->setPaper('a3', 'landscape')
           ->download('filtrado.pdf'); 
   
}



   
}


        
        
    
