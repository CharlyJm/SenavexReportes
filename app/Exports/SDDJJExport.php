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

class SDDJJExport implements  Responsable, WithTitle, FromView,ShouldAutoSize
{
    
    use Exportable;
    public function __construct($fromDate, $toDate)
    {
        $this->fronDate = $fromDate;
        $this->toDate = $toDate;
    }

    public function view(): View
    {
//         $fronDate = $request->input('fromDate');
// $toDate = $request->input('toDate');


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
        WHERE  a.fecha_aprobacion >= ' $this->fronDate'
          and   a.fecha_aprobacion<= '$this->toDate' 
        ) z");  
       
       return view('repSDDJJ.excel.home', [
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