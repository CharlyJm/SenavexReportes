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

class RACOExport implements  Responsable, WithTitle, FromView,ShouldAutoSize
{
    
    use Exportable;
    public function __construct($fromDate, $toDate)
    {
        $this->fronDate = $fromDate;
        $this->toDate = $toDate;
    }

    public function view(): View
    {


        $procesos=DB::select(" SELECT row_number() OVER () as number_row,
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
        and  co.fecha_anulacion >= ' $this->fronDate'
          and  co.fecha_anulacion <= '$this->toDate' 
        ");  
       
       return view('repRACO.excel.home', [
        "procesos"=>$procesos,
        "f1"=> $this->fronDate,
        "f2"=>$this->toDate
      
    ]);
    }
    public function title(): string
    {
        return 'Reporte de';
    }
// }

}