<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Exports\RDDJJExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empresas; 
use App\Models\Ddjjs;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Carbon\Carbon;

class RddjjController extends Controller
{
    
       
        public function export(Request $request) 
        {  
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
       return Excel::download(new RDDJJExport(), 'Reporte_DDJJ.xlsx');
                
        }



public function getProcesos(){
    $proceso="SELECT*, case 
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
    SELECT row_number() OVER () as number_row,xyz.ruex, b.razon_social,g.departamento, c.descripcion_categoria, d.sigla||'-'||d.acuerdo as acuerdo, e.denominacion_comercial,
e.codigo_nandina as nandina, e.codigo_nandina_naladisa as naladisa, f.criterio,a.id_acuerdo,
a.fecha_aprobacion, a.fecha_vencimiento, a.fecha_baja, abc.certificador, abc.observaciones,
to_char(a.fecha_aprobacion, 'mm') as mes,
to_char(a.fecha_aprobacion, 'YYYY') as anio 
from ddjjs a
inner join ddjj_datos_mercancias e on e.id_ddjj = a.id_ddjj
inner join empresas b on a.id_empresa = b.id_empresa
INNER JOIN (
SELECT a.id_ruex, a.id_empresa, a.ruex FROM ruexs a WHERE a.ruex_estado = true                                        
) xyz on xyz.id_empresa = a.id_empresa
inner join empresa_categorias c on c.id_categoria = b.id_categoria
inner join acuerdos d on d.id_acuerdo = a.id_acuerdo
inner join  ddjj_origen_criterios f on a.id_ddjj_origen_criterio = f.id_ddjj_origen_criterio
INNER JOIN (
SELECT distinct on (a.id_ddjj) a.id_ddjj, a.id_ddjj_solicitud, b.nombres||' '||b.primer_apellido as certificador, a.id_ddjj_solicitud_estado, a.solicitud_observaciones as observaciones
FROM ddjj_solicituds a
inner join personas b on b.id_persona = a.id_revisor        
ORDER BY a.id_ddjj, a.id_ddjj_solicitud  desc
) abc on abc.id_ddjj = a.id_ddjj
inner join departamentos g on g.id_departamento = b.id_departamento
where b.id_empresa = 185
) z
   
    ";
    
    $procesos=DB::select($proceso);
    $data = ['procesos' => $procesos];
    
    return view('repDDJJ.ddjj.home', $data);
}
//buscar por rango de fechas
public function postProcesosbuscar(Request $request){
    
    $fronDate = $request->input('fromDate');
    $toDate = $request->input('toDate');

    $f1=$fronDate ;
   $f2= $toDate;
    


$proceso="SELECT *, case 
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
    SELECT row_number() OVER () as number_row, xyz.ruex, b.razon_social,g.departamento, c.descripcion_categoria, d.sigla||'-'||d.acuerdo as acuerdo, e.denominacion_comercial,
	   e.codigo_nandina as nandina, e.codigo_nandina_naladisa as naladisa, f.criterio,a.id_acuerdo,
	   a.fecha_aprobacion, a.fecha_vencimiento, a.fecha_baja, abc.certificador, abc.observaciones,
	   to_char(a.fecha_aprobacion, 'mm') as mes,
       to_char(a.fecha_aprobacion, 'YYYY') as anio 
from ddjjs a
inner join ddjj_datos_mercancias e on e.id_ddjj = a.id_ddjj
inner join empresas b on a.id_empresa = b.id_empresa
INNER JOIN (
    SELECT a.id_ruex, a.id_empresa, a.ruex FROM ruexs a WHERE a.ruex_estado = true                                        
) xyz on xyz.id_empresa = a.id_empresa
inner join empresa_categorias c on c.id_categoria = b.id_categoria
inner join acuerdos d on d.id_acuerdo = a.id_acuerdo
inner join  ddjj_origen_criterios f on a.id_ddjj_origen_criterio = f.id_ddjj_origen_criterio
INNER JOIN (
    SELECT distinct on (a.id_ddjj) a.id_ddjj, a.id_ddjj_solicitud, b.nombres||' '||b.primer_apellido as certificador, a.id_ddjj_solicitud_estado, a.solicitud_observaciones as observaciones
        FROM ddjj_solicituds a
        inner join personas b on b.id_persona = a.id_revisor        
    ORDER BY a.id_ddjj, a.id_ddjj_solicitud  desc
) abc on abc.id_ddjj = a.id_ddjj
inner join departamentos g on g.id_departamento = b.id_departamento
where b.id_empresa = 185
and a.fecha_aprobacion >= '$fronDate'
  and  a.fecha_aprobacion <= '$toDate' ) z";

$procesos=DB::select($proceso);
    return View('repDDJJ.pdf.home', compact('procesos','f1','f2'));
    //  return \PDF::loadView('repDDJJ.pdf.home', compact('procesos','f1','f2'))
    //         ->setPaper('a3', 'landscape')
    //         ->download('filtrado.pdf'); 
   
}



   
}


        
        
    
