<?php

namespace App\Http\Controllers;

use App\Models\Ddjjs;
use App\Models\User;
use App\Models\Cos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ChartController extends Controller
{
    public function index(){  
      
        $ddjjs_anual=DB::select("select z.mes, 
        sum(case when z.id_acuerdo = 1 then z.total::INTEGER else '0' end) as a_01,
        sum(case when z.id_acuerdo = 2 then z.total::INTEGER else '0' end) as a_02,
        sum(case when z.id_acuerdo = 3 then z.total::INTEGER else '0' end) as a_03,
        sum(case when z.id_acuerdo = 4 then z.total::INTEGER else '0' end) as a_04,
        sum(case when z.id_acuerdo = 5 then z.total::INTEGER else '0' end) as a_05,
        sum(case when z.id_acuerdo = 6 then z.total::INTEGER else '0' end) as a_06,
        sum(case when z.id_acuerdo = 7 then z.total::INTEGER else '0' end) as a_07,
        sum(case when z.id_acuerdo = 8 then z.total::INTEGER else '0' end) as a_08,
        sum(case when z.id_acuerdo = 9 then z.total::INTEGER else '0' end) as a_09,
        sum(case when z.id_acuerdo = 10 then z.total::INTEGER else '0' end) as a_10,
        sum(case when z.id_acuerdo = 11 then z.total::INTEGER else '0' end) as a_11,
        sum(case when z.id_acuerdo = 12 then z.total::INTEGER else '0' end) as a_12,
        sum(case when z.id_acuerdo = 13 then z.total::INTEGER else '0' end) as a_13,
        sum(case when z.id_acuerdo = 14 then z.total::INTEGER else '0' end) as a_14,
        sum(case when z.id_acuerdo = 15 then z.total::INTEGER  else '0' end) as a_15,
        sum(case when z.id_acuerdo = 16 then z.total::INTEGER  else '0' end) as a_16,
        sum(case when z.id_acuerdo = 17 then z.total::INTEGER  else '0' end) as a_17,
        sum(case when z.id_acuerdo = 18 then z.total::INTEGER  else '0' end) as a_18,
        sum(case when z.id_acuerdo = 19 then z.total::INTEGER  else '0' end) as a_19,
        sum(case when z.id_acuerdo = 20 then z.total::INTEGER  else '0' end) as a_20,
        sum(case when z.id_acuerdo = 21 then z.total::INTEGER  else '0' end) as a_21,
        sum(case when z.id_acuerdo = 22 then z.total::INTEGER  else '0' end) as a_22
        from (
        select abc.mes, t.id_acuerdo, t.acuerdo||'-'||t.sigla as acuerdo, count(abc.id_acuerdo) as total
        from (
          select 	a.id_acuerdo, to_char(a.fecha_aprobacion, 'mm') as mes, to_char(a.fecha_aprobacion, 'YYYY') as anio
          from ddjjs a
          where a.fecha_aprobacion is not null
        ) abc
        inner join acuerdos t on t.id_acuerdo = abc.id_acuerdo
        where abc.anio = 2021::text
        group by abc.mes, t.id_acuerdo, t.acuerdo, t.sigla
        order by abc.mes
        ) z
        group by z.mes");
    // dd($ddjjs_anual);
    $sum=0;
             $data_anual_ddjjs=[];
       foreach($ddjjs_anual as $ddjj){
          $data_anual_ddjjs['data_anual_ddjjs'][]=$ddjj->mes;
          $data_anual_ddjjs['comunidad_andina_naciones'][]=$ddjj->a_01;
          $data_anual_ddjjs['mercosur'][]=$ddjj->a_02;
          $data_anual_ddjjs['chile'][]=$ddjj->a_03;
          $data_anual_ddjjs['cuba'][]=$ddjj->a_04;
          $data_anual_ddjjs['acuerdo_venezuela'][]=$ddjj->a_05;
          $data_anual_ddjjs['paraguay_semillas'][]=$ddjj->a_06;
          $data_anual_ddjjs['argentina_semillas'][]=$ddjj->a_07;
          $data_anual_ddjjs['canada'][]=$ddjj->a_08;
          $data_anual_ddjjs['suiza'][]=$ddjj->a_09;
          $data_anual_ddjjs['noruega'][]=$ddjj->a_10;
          $data_anual_ddjjs['japon'][]=$ddjj->a_11;
          
    
       }
       $data_anual_ddjjs['data_anual_ddjjs']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['comunidad_andina_naciones']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['mercosur']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['chile']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['cuba']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['acuerdo_venezuela']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['paraguay_semillas']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['argentina_semillas']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['canada']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['suiza']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['noruega']=json_encode($data_anual_ddjjs);
       $data_anual_ddjjs['japon']=json_encode($data_anual_ddjjs);
       
     $data_anual_ddjj=[];
     foreach($ddjjs_anual as $ddjj){
      $data_anual_ddjj['data_anual_ddjj'][]=$ddjj->mes;
        $data_anual_ddjj['nueva_zalanda'][]=$ddjj->a_12;
        $data_anual_ddjj['bielorrusia'][]=$ddjj->a_13;
        $data_anual_ddjj['turquia'][]=$ddjj->a_14;
        $data_anual_ddjj['australia'][]=$ddjj->a_15;
        $data_anual_ddjj['union_europea'][]=$ddjj->a_16;
        $data_anual_ddjj['estados_unidos'][]=$ddjj->a_17;
        $data_anual_ddjj['terceros_paises'][]=$ddjj->a_18;
        $data_anual_ddjj['panama'][]=$ddjj->a_19;
        $data_anual_ddjj['federacion_rusa'][]=$ddjj->a_20;
        $data_anual_ddjj['reino_unido'][]=$ddjj->a_21;
        $data_anual_ddjj['kazajistan'][]=$ddjj->a_22;
        
}


$data_anual_ddjj['data_anual_ddjj']=json_encode($data_anual_ddjj);
$data_anual_ddjj['nueva_zalanda']=json_encode($data_anual_ddjj);
$data_anual_ddjj['bielorrusia']=json_encode($data_anual_ddjj);
$data_anual_ddjj['turquia']=json_encode($data_anual_ddjj);
$data_anual_ddjj['australia']=json_encode($data_anual_ddjj);
$data_anual_ddjj['union_europea']=json_encode($data_anual_ddjj);
$data_anual_ddjj['estados_unidos']=json_encode($data_anual_ddjj);
$data_anual_ddjj['terceros_paises']=json_encode($data_anual_ddjj);
$data_anual_ddjj['panama']=json_encode($data_anual_ddjj);
$data_anual_ddjj['federacion_rusa']=json_encode($data_anual_ddjj);
$data_anual_ddjj['reino_unido']=json_encode($data_anual_ddjj);
$data_anual_ddjj['kazajistan']=json_encode($data_anual_ddjj);

//dd($data_anual_ddjj);


       return view("grafico/grafico2",$data_anual_ddjjs, $data_anual_ddjj);
     
    
}

    public function ChartTorta(){  
    
     
    $datos_totales=DB::select("select (
      select count(a.id_ddjj)
      from ddjjs a
      where a.num_solicitud_ddjj = '-1'
      ) as ddjj,
      (select count(id_co) from cos a) as co,
      (select count(a.id_empresa) from (
      select distinct (a.id_empresa)
      from ruex_solicituds a
      ) a) as ruex");

      $datos_total=[];
      foreach($datos_totales as $total){
     $datos_total[]=['name'=>'ddjjs','y'=>floatval($total->ddjj)];
     $datos_total[]=['name'=>'co','y'=>floatval($total->co)];
     $datos_total[]=['name'=>'ruex','y'=>floatval($total->ruex)];
      }
/////////----------

   return view("grafico/grafico1",["data"=>json_encode($datos_total)]);
    }
   public function ChartTotal(){  
    $total_ddjjs= DB::select("
    select mes, count(abc.id_acuerdo) as cantidad  from (
      select 	a.id_acuerdo, to_char(a.fecha_aprobacion, 'mm') as mes, 
      to_char(a.fecha_aprobacion, 'YYYY') as anio
      from ddjjs a
      where a.fecha_aprobacion is not null
    ) abc
    where abc.anio = 2021::text 
    group by abc.mes
    ");
    
    $total_mes=[];
    foreach($total_ddjjs as $tota_ddjjs){
        $total_mes['total_mes'][]=$tota_ddjjs->cantidad;
    }
   $total_mes['total_mes']=json_encode($total_mes);

 return view("grafico/grafico3",$total_mes);

     
    }
}
