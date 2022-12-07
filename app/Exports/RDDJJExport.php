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

class RDDJJExport implements  Responsable, WithTitle, FromView,ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
//         $fronDate = $request->input('fromDate');
// $toDate = $request->input('toDate');

$f1='2022-11-30';
$f2='2022-12-8';

$procesos=DB::select(" SELECT *, case 
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
and a.fecha_aprobacion >= '$f1'
and  a.fecha_aprobacion <= '$f2' ) z");
       
       return view('repDDJJ.excel.home', [
        "procesos"=>$procesos,
        "f1"=>$f1,
        "f2"=>$f2
      
    ]);
    }
    public function title(): string
    {
        return 'Reporte de';
    }
// }

}