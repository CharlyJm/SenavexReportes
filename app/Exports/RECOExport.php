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
class RECOExport implements  Responsable, WithTitle, FromView,ShouldAutoSize
{
    use Exportable;
    public function __construct($fromDate, $toDate)
    {
        $this->fronDate = $fromDate;
        $this->toDate = $toDate;
    }
    public function view(): View
    {

$procesos=DB::select("SELECT row_number() OVER () as number_row,
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
and co.fecha_emision >= '$this->fronDate'
and co.fecha_emision <= '$this->toDate'
ORDER BY number_row, co.fecha_emision, co.nro_control");
       
       return view('repRECO.excel.home', [
        "procesos"=>$procesos,
        "f1"=>$this->fronDate,
        "f2"=>$this->toDate
      
    ]);
    }
    public function title(): string
    {
        return 'Reporte de';
    }
// }

}