<?php

namespace App\Exports;
use DB;
use App\Models\Ddjjs;
use App\Models\Empresas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\FromCollection;

class RrcoExport implements  Responsable, WithTitle, FromView,ShouldAutoSize

{
    use Exportable;

    public function view(): View
    {
//         $fronDate = $request->input('fromDate');
// $toDate = $request->input('toDate');

$f1='2022-11-30';
$f2='2022-12-8';

        $procesos=DB::select(" SELECT
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
         WHERE c.fecha_emision >= '$f1'
         and  c.fecha_emision <= '$f2'"); 
       
       return view('repRRCO.excel.home', [
        "procesos"=>$procesos,
        "f1"=>$f1,
        "f2"=>$f2
      
    ]);
    }
    public function title(): string
    {
        return 'Reporte de asistencia mensual';
    }
// }

}