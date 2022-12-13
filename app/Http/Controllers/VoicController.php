<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Exports\VOICExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empresas; 
use App\Models\Ddjjs;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Carbon\Carbon;

class VoicController extends Controller
{
      
        public function get(){
            $proceso="SELECT row_number() OVER () as number_row,c.razon_social as exportador, c.n_emision as n, c.lote, round(c.peso_neto/60,2) as sacos, c.peso_neto as volumen, '6.96' as TC, '0.20' AS P_U,c.fecha_emision, cr.nro_recibo,d.num_deposito,d.monto
            ,d.fecha_deposito, cs.fecha_revision
            
            from cafe_certificados c
            left join depositos d on d.id_deposito=c.id_deposito
            left join regionals r on c.id_regional=r.id_regional
            left join cafe_recibo cr on cr.id_certificado=c.id_certificado
            left join cafe_solicituds cs on cs.id_certcafe=c.id_certificado
            where d.id_deposito_estado=2
            and cs.id_solicitud_estado=2
            and r.id_regional=2
            order by c.id_certificado 
           
            ";
            
            $procesos=DB::select($proceso);
            $data = ['procesos' => $procesos];
            
            return view('repVOIC.excel.excel', $data);
        }
        //buscar por rango de fechas
        public function postProcesos(Request $request){
        
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');

       return Excel::download(new VOICExport($request->fromDate, $request->toDate), 'Venta_Certificads.xlsx');
            $fronDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
   
 
        
    
        }
        


public function getProcesos(){
    $proceso="SELECT row_number() OVER () as number_row,c.razon_social as exportador, c.n_emision as n, c.lote, round(c.peso_neto/60,2) as sacos, c.peso_neto as volumen, '6.96' as TC, '0.20' AS P_U,c.fecha_emision, cr.nro_recibo,d.num_deposito,d.monto
    ,d.fecha_deposito, cs.fecha_revision
    
    from cafe_certificados c
    left join depositos d on d.id_deposito=c.id_deposito
    left join regionals r on c.id_regional=r.id_regional
    left join cafe_recibo cr on cr.id_certificado=c.id_certificado
    left join cafe_solicituds cs on cs.id_certcafe=c.id_certificado
    where d.id_deposito_estado=2
    and cs.id_solicitud_estado=2
    and r.id_regional=2
    order by c.id_certificado 
   
    ";
    
    $procesos=DB::select($proceso);
    $data = ['procesos' => $procesos];
    
    return view('repVOIC.voic.home', $data);
}
//buscar por rango de fechas
public function postProcesosbuscar(Request $request){

  
    $fronDate = $request->input('fromDate');
    $toDate = $request->input('toDate');

    $f1=$fronDate ;
   $f2= $toDate;


$proceso="SELECT row_number() OVER () as number_row,
c.razon_social as exportador, c.n_emision as n, c.lote, round(c.peso_neto/60,2) as sacos, c.peso_neto as volumen, 
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
and cs.fecha_revision >= '$fronDate'
and cs.fecha_revision  <= '$toDate'
ORDER BY  c.id_certificado   
" ;

$procesos=DB::select($proceso);



$cierre="select 'O.I.C. | '||s.descripcion_servicio as servicio,
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
and cs.fecha_revision >= '$fronDate'
and cs.fecha_revision  <= '$toDate'
group by s.descripcion_servicio";
$cierres=DB::select($cierre);





     return \PDF::loadView('repVOIC.pdf.home', compact('procesos','f1','f2','cierres'))
    ->download('certificado_cafe.pdf'); 

//  return View('repVOIC.pdf.home', compact('procesos','f1','f2'));
   
}


   
}


        
        
    
