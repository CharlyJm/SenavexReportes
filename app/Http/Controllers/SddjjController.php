<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Exports\SDDJJExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empresas; 
use App\Models\Ddjjs;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Carbon\Carbon;

class SddjjController extends Controller
{
  

 
       
        public function export(Request $request) 
        {  
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
       return Excel::download(new SDDJJExport(), 'sddjj.xlsx');
                      
      return Excel::download(new SDDJJExport($request->fromDate, $request->toDate), 'Venta_Certificads.xlsx');
       
        }


        public function get (){
            $proceso="
            SELECT *, case 
            when mes = '01' then 'Enero'
            when mes = '02' then 'Febrero'
            when mes = '03' then 'Marzo'
            when mes = '04' then 'Abril'
            when mes = '05' then 'Mayo'
            when mes = '06' then 'Junio'
            when mes = '07' then 'Julio'
            when mes = '08' then 'Agosto'
            when mes = '09' then 'Septiembre'
            when mes = '10' then 'Octubre'
            when mes = '11' then 'Noviembre'
            when mes = '12' then 'Diciembre'
            end as mes
            from (        
            SELECT row_number() OVER () as number_row, 
            a.numero_ddjj,
            d.sigla||'-'||d.acuerdo as acuerdo,
            xyz.ruex, b.razon_social,
            abc.fecha_registro,
            case
                when es.id_ddjj_estado = 6 then 'Emisión'
                when es.id_ddjj_estado = 9 then 'Actualización'
                when es.id_ddjj_estado = 10 then 'Actualización'
                when es.id_ddjj_estado = 11 then 'Actualización'	        
            end as emision,
            es.descripcion as estado,
            abc.fecha_asignacion as fecha_revision,
            abc.fecha_revision as fecha_entrega,
            g.departamento,        
            to_char(a.fecha_aprobacion, 'mm') as mes,
            to_char(a.fecha_aprobacion, 'YYYY') as anio
            from ddjjs a
            inner join ddjj_estados es on es.id_ddjj_estado = a.id_ddjj_estado
            inner join ddjj_datos_mercancias e on e.id_ddjj = a.id_ddjj
            inner join empresas b on a.id_empresa = b.id_empresa
            INNER JOIN (
            SELECT a.id_ruex, a.id_empresa, a.ruex FROM ruexs a WHERE a.ruex_estado = true                                        
            ) xyz on xyz.id_empresa = a.id_empresa
            inner join acuerdos d on d.id_acuerdo = a.id_acuerdo
            inner join  ddjj_origen_criterios f on a.id_ddjj_origen_criterio = f.id_ddjj_origen_criterio
            INNER JOIN (
            SELECT distinct on (a.id_ddjj) a.id_ddjj, a.id_ddjj_solicitud_estado,
                    c.id_regional, a.fecha_registro, a.fecha_asignacion, a.fecha_revision
            FROM ddjj_solicituds a
            inner join personas b on b.id_persona = a.id_revisor
            inner join empresas_personas c on c.id_persona = b.id_persona
            ORDER BY a.id_ddjj, a.id_ddjj_solicitud  desc
            ) abc on abc.id_ddjj = a.id_ddjj
            inner join departamentos g on g.id_departamento = b.id_departamento
         
            ) z";
            
            $procesos=DB::select($proceso);
            $data = ['procesos' => $procesos];
            
            return view('repSDDJJ.excel.exce', $data);
        }
        //buscar por rango de fechas
        public function postProcesos(Request $request){
            
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');

      return Excel::download(new SDDJJExport($request->fromDate, $request->toDate), 'Seguimiento_DDJJ.xlsx');
       
         }
        

public function getProcesos(){
    $proceso="
    SELECT *, case 
    when mes = '01' then 'Enero'
    when mes = '02' then 'Febrero'
    when mes = '03' then 'Marzo'
    when mes = '04' then 'Abril'
    when mes = '05' then 'Mayo'
    when mes = '06' then 'Junio'
    when mes = '07' then 'Julio'
    when mes = '08' then 'Agosto'
    when mes = '09' then 'Septiembre'
    when mes = '10' then 'Octubre'
    when mes = '11' then 'Noviembre'
    when mes = '12' then 'Diciembre'
    end as mes
    from (        
    SELECT row_number() OVER () as number_row, 
    a.numero_ddjj,
    d.sigla||'-'||d.acuerdo as acuerdo,
    xyz.ruex, b.razon_social,
    abc.fecha_registro,
    case
        when es.id_ddjj_estado = 6 then 'Emisión'
        when es.id_ddjj_estado = 9 then 'Actualización'
        when es.id_ddjj_estado = 10 then 'Actualización'
        when es.id_ddjj_estado = 11 then 'Actualización'	        
    end as emision,
    es.descripcion as estado,
    abc.fecha_asignacion as fecha_revision,
    abc.fecha_revision as fecha_entrega,
    g.departamento,        
    to_char(a.fecha_aprobacion, 'mm') as mes,
    to_char(a.fecha_aprobacion, 'YYYY') as anio
    from ddjjs a
    inner join ddjj_estados es on es.id_ddjj_estado = a.id_ddjj_estado
    inner join ddjj_datos_mercancias e on e.id_ddjj = a.id_ddjj
    inner join empresas b on a.id_empresa = b.id_empresa
    INNER JOIN (
    SELECT a.id_ruex, a.id_empresa, a.ruex FROM ruexs a WHERE a.ruex_estado = true                                        
    ) xyz on xyz.id_empresa = a.id_empresa
    inner join acuerdos d on d.id_acuerdo = a.id_acuerdo
    inner join  ddjj_origen_criterios f on a.id_ddjj_origen_criterio = f.id_ddjj_origen_criterio
    INNER JOIN (
    SELECT distinct on (a.id_ddjj) a.id_ddjj, a.id_ddjj_solicitud_estado,
            c.id_regional, a.fecha_registro, a.fecha_asignacion, a.fecha_revision
    FROM ddjj_solicituds a
    inner join personas b on b.id_persona = a.id_revisor
    inner join empresas_personas c on c.id_persona = b.id_persona
    ORDER BY a.id_ddjj, a.id_ddjj_solicitud  desc
    ) abc on abc.id_ddjj = a.id_ddjj
    inner join departamentos g on g.id_departamento = b.id_departamento
 
    ) z";
    
    $procesos=DB::select($proceso);
    $data = ['procesos' => $procesos];
    
    return view('repSDDJJ.sddjj.home', $data);
}
//buscar por rango de fechas
public function postProcesosbuscar(Request $request){
    
    $fronDate = $request->input('fromDate');
    $toDate = $request->input('toDate');

    $f1=$fronDate ;
   $f2= $toDate;
    
  


$proceso=" SELECT *, case 
when mes = '01' then 'Enero'
when mes = '02' then 'Febrero'
when mes = '03' then 'Marzo'
when mes = '04' then 'Abril'
when mes = '05' then 'Mayo'
when mes = '06' then 'Junio'
when mes = '07' then 'Julio'
when mes = '08' then 'Agosto'
when mes = '09' then 'Septiembre'
when mes = '10' then 'Octubre'
when mes = '11' then 'Noviembre'
when mes = '12' then 'Diciembre'
end as mes
from (        
SELECT row_number() OVER () as number_row, 
a.numero_ddjj,
d.sigla||'-'||d.acuerdo as acuerdo,
xyz.ruex, b.razon_social,
abc.fecha_registro,
case
    when es.id_ddjj_estado = 6 then 'Emisión'
    when es.id_ddjj_estado = 9 then 'Actualización'
    when es.id_ddjj_estado = 10 then 'Actualización'
    when es.id_ddjj_estado = 11 then 'Actualización'	        
end as emision,
es.descripcion as estado,
abc.fecha_asignacion as fecha_revision,
abc.fecha_revision as fecha_entrega,
g.departamento,        
to_char(a.fecha_aprobacion, 'mm') as mes,
to_char(a.fecha_aprobacion, 'YYYY') as anio
from ddjjs a
inner join ddjj_estados es on es.id_ddjj_estado = a.id_ddjj_estado
inner join ddjj_datos_mercancias e on e.id_ddjj = a.id_ddjj
inner join empresas b on a.id_empresa = b.id_empresa
INNER JOIN (
SELECT a.id_ruex, a.id_empresa, a.ruex FROM ruexs a WHERE a.ruex_estado = true                                        
) xyz on xyz.id_empresa = a.id_empresa
inner join acuerdos d on d.id_acuerdo = a.id_acuerdo
inner join  ddjj_origen_criterios f on a.id_ddjj_origen_criterio = f.id_ddjj_origen_criterio
INNER JOIN (
SELECT distinct on (a.id_ddjj) a.id_ddjj, a.id_ddjj_solicitud_estado,
        c.id_regional, a.fecha_registro, a.fecha_asignacion, a.fecha_revision
FROM ddjj_solicituds a
inner join personas b on b.id_persona = a.id_revisor
inner join empresas_personas c on c.id_persona = b.id_persona
ORDER BY a.id_ddjj, a.id_ddjj_solicitud  desc
) abc on abc.id_ddjj = a.id_ddjj
inner join departamentos g on g.id_departamento = b.id_departamento
WHERE  a.fecha_aprobacion >= '$fronDate'
  and   a.fecha_aprobacion<= '$toDate' 
) z";  


$procesos=DB::select($proceso);
   // return View('repSDDJJ.pdf.home', compact('procesos','f1','f2'));
    return View('repSDDJJ.pdf.home', ['procesos'=>$procesos,'f1'=>$f1,'f2'=>$f2]);
   return \PDF::loadView('repSDDJJ.pdf.home', compact('procesos','f1','f2'))
           ->setPaper('a3', 'landscape')
          ->download('filtrado.pdf');
   
 }



   
}


        
        
    