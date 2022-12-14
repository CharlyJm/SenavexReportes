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

class SCOExport implements   Responsable, WithTitle, FromView,ShouldAutoSize
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
       AND cosol.fecha_registro  >= '$this->fronDate'
          and  cosol.fecha_registro <= '$this->toDate'"); 
       
       return view('repSCO.excel.home', [
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