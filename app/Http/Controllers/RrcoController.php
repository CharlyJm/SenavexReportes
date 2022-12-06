<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Exports\RrcoExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empresas; 
use App\Models\Ddjjs;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Carbon\Carbon;
class RrcoController extends Controller
{
    
       
        public function export(Request $request) 
        {  
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
       return Excel::download(new RrcoExport(), 'RRCO.xlsx');
                
        }



public function getProcesos(){
    $proceso="
    select 
	abc.ruex,
     '---' as co_correlativo,
	c.fecha_emision,
	c.nro_control,
	d.descripcion_co_tipo as tico_co,
	f.acuerdo ||' '||f.sigla ac_rp,
	g.cod_arancelario as cla_arancelaria,
	g.denominacion_mercaderia as descripcion_comercial,
	g.valor_fob,
	g.peso_neto,
	h.num_factura,
	i.criterio,
	abc.ruex,
	j.numero_ddjj,
	j.numero_ddjj_old,
	e.razon_social,
	k.descripcion_categoria,
	n.pais as pais_destino,
	o.descripcion_co_tipo_emision,
	c.observaciones_grals,
	to_char(c.fecha_emision, 'mm') as mes,
    to_char(c.fecha_emision, 'YYYY') as anio 
from empresas e 
inner join (
select distinct on (r.id_ruex ) r.id_ruex, r.id_empresa, r.ruex 
from ruexs r
order by r.id_ruex
) abc on abc.id_empresa = e.id_empresa
inner join cos c on c.id_empresa= e.id_empresa
inner join co_tipos d on d.id_co_tipo = c.id_co_tipo
inner join acuerdos f on f.id_acuerdo = c.id_acuerdo
inner join co_mercaderias g on g.id_co = c.id_co
inner join co_factura_comercials h on h.id_co = c.id_co
inner join ddjj_origen_criterios i on i.id_ddjj_origen_criterio = g.id_ddjj_origen_criterio
inner join ddjjs j on j.id_ddjj = g.id_ddjj
inner join empresa_categorias k on k.id_categoria = e.id_categoria
inner join co_exportadors m on m.id_co = c.id_co
inner join pais n on n.id_pais = m.id_pais
inner join co_tipo_emisions o on o.id_co_tipo_emision = c.id_co_tipo_emision";
    
    $procesos=DB::select($proceso);
    $data = ['procesos' => $procesos];
    
    return view('repRRCO.rrco.home', $data);
}
//buscar por rango de fechas
public function postProcesosbuscar(Request $request){
    
    $fronDate = $request->input('fromDate');
    $toDate = $request->input('toDate');

    $f1=$fronDate ;
   $f2= $toDate;
    
  


$proceso=" SELECT
abc.ruex, '---' as co_correlativo,c.fecha_emision,c.nro_control,d.descripcion_co_tipo 
as tico_co,f.acuerdo ||'-'||f.sigla ac_rp,g.cod_arancelario
 as cla_arancelaria,g.denominacion_mercaderia 
 as descripcion_comercial,g.valor_fob,g.peso_neto,h.num_factura,i.criterio,abc.ruex,j.numero_ddjj,j.numero_ddjj_old,e.razon_social,k.descripcion_categoria,n.pais 
 as pais_destino,o.descripcion_co_tipo_emision,c.observaciones_grals,to_char(c.fecha_emision, 'mm') 
 as mes,to_char(c.fecha_emision, 'YYYY')
  as anio 
FROM empresas e 
inner join (
SELECT distinct on (r.id_ruex ) r.id_ruex, r.id_empresa, r.ruex 
FROM ruexs r
order by r.id_ruex
) abc on abc.id_empresa = e.id_empresa
INNER JOIN cos c on c.id_empresa= e.id_empresa
INNER JOIN co_tipos d on d.id_co_tipo = c.id_co_tipo
INNER JOIN acuerdos f on f.id_acuerdo = c.id_acuerdo
INNER JOIN co_mercaderias g on g.id_co = c.id_co
INNER JOIN co_factura_comercials h on h.id_co = c.id_co
INNER JOIN ddjj_origen_criterios i on i.id_ddjj_origen_criterio = g.id_ddjj_origen_criterio
INNER JOIN ddjjs j on j.id_ddjj = g.id_ddjj
INNER JOIN empresa_categorias k on k.id_categoria = e.id_categoria
INNER JOIN co_exportadors m on m.id_co = c.id_co
INNER JOIN pais n on n.id_pais = m.id_pais
INNER JOIN co_tipo_emisions o on o.id_co_tipo_emision = c.id_co_tipo_emision
WHERE c.fecha_emision >= '$fronDate'
  and  c.fecha_emision <= '$toDate' ";

$procesos=DB::select($proceso);
    // return View('repRRCO.pdf.home', compact('procesos','f1','f2'));
    // return View('repRRCO.rrco.home', ['procesos'=>$procesos,'f1'=>$f1,'f2'=>$f2]);
     return \PDF::loadView('repRRCO.pdf.home', compact('procesos','f1','f2'))
            ->setPaper('a3', 'landscape')
            ->download('filtrado.pdf');
   
}



   
}


        
        
    