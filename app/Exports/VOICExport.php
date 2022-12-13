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

class VOICExport implements Responsable, WithTitle, FromView,ShouldAutoSize
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
c.razon_social as exportador, c.n_emision as n, c.lote, round(c.peso_neto/60,2) as sacos,
 c.peso_neto as volumen, 
'6.96' as TC, '0.20' AS P_U,c.fecha_emision,
  cr.nro_recibo,d.num_deposito,d.monto
,d.fecha_deposito, cs.fecha_revision
from cafe_certificados c
left join depositos d on d.id_deposito=c.id_deposito
left join regionals r on c.id_regional=r.id_regional
left join cafe_recibo cr on cr.id_certificado=c.id_certificado
left join cafe_solicituds cs on cs.id_certcafe=c.id_certificado
where d.id_deposito_estado=2
and cs.id_solicitud_estado=2
and r.id_regional=2
and cs.fecha_revision >= '$this->fronDate'
and cs.fecha_revision  <= '$this->toDate'
ORDER BY  c.id_certificado "  );



$cierres=DB::select("SELECT 'O.I.C. | '||s.descripcion_servicio as servicio,
(max(c.n_emision)-min(c.n_emision))+1 as ctd,
min(c.n_emision) as del,
max(c.n_emision) as al, 
min(cr.nro_recibo) as ini,
max(cr.nro_recibo) as fin, 
sum(d.monto) as total ,
sum( round(c.peso_neto/60,2)) as sacos ,
sum(c.peso_neto) as volumen 
from cafe_certificados c
left join depositos d on d.id_deposito=c.id_deposito
left join regionals r on c.id_regional=r.id_regional
left join cafe_recibo cr on cr.id_certificado=c.id_certificado
left join cafe_solicituds cs on cs.id_certcafe=c.id_certificado
left join servicios s on id_servicio=5
where d.id_deposito_estado=2
and cs.id_solicitud_estado=2
and r.id_regional=2
and cs.fecha_revision >= '$this->fronDate'
and cs.fecha_revision  <= '$this->toDate'
group by s.descripcion_servicio");




       return view('repVOIC.excel.home', [
        "procesos"=>$procesos,
        "cierres"=>$cierres,
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