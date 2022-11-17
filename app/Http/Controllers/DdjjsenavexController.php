<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Exports\DdjjExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empresas; 
use App\Models\Ddjjs;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class DdjjsenavexController extends Controller


    {
        public function index()
        {
       
            $ddjj = "SELECT row_number() OVER () as number_row,  a.id_ddjj, b.id_ddjj_estado, a.numero_ddjj, b.descripcion as estado_descripcion, a.id_ddjj_tipo,
            d.id_acuerdo, d.sigla, (d.sigla ||'-'|| d.acuerdo) as acuerdo_sigla, a.fecha_aprobacion,a.id_empresa, a.fecha_vencimiento
                FROM ddjjs a
                INNER JOIN ddjj_estados b ON b.id_ddjj_estado = a.id_ddjj_estado
                INNER JOIN acuerdos d ON d.id_acuerdo = a.id_acuerdo
                INNER JOIN ddjj_solicituds e on e.id_ddjj = a.id_ddjj
                WHERE a.id_empresa=7 and b.descripcion= 'Habilitado'";
                $ddjjs = DB::select($ddjj);
    
                   $empresa = " SELECT e.razon_social, e.nombre_comercial, e.nit, e.telefono, e.celular, e.email 
                   from empresas e 
                   where e.id_empresa = 2 ";
                   $empresas = DB::select($empresa);
                   ////////////
                   
                   $baja="SELECT row_number() OVER () as number_row, a.id_ddjj, b.id_ddjj_estado, a.numero_ddjj, b.descripcion as estado_descripcion, a.id_ddjj_tipo,
                             d.id_acuerdo, d.sigla, (d.sigla ||'-'|| d.acuerdo) as acuerdo_sigla, a.num_solicitud_ddjj, a.fecha_baja
                            FROM ddjjs a
                            INNER JOIN ddjj_estados b ON b.id_ddjj_estado = a.id_ddjj_estado
                            INNER JOIN acuerdos d ON d.id_acuerdo = a.id_acuerdo   
                             WHERE a.id_empresa=2 and b.descripcion= 'Baja'";
                  $bajas = DB::select($baja);
                
                   return view('reportes/ddjj',["empresas"=>$empresas,"ddjjs"=>$ddjjs,"bajas"=>$bajas]);
    
            
        }
    
    
    
        public function imprimir(){ 
            $ddjj = "SELECT row_number() OVER () as number_row,  a.id_ddjj, b.id_ddjj_estado, a.numero_ddjj, b.descripcion as estado_descripcion, a.id_ddjj_tipo,
            d.id_acuerdo, d.sigla, (d.sigla ||'-'|| d.acuerdo) as acuerdo_sigla, a.fecha_aprobacion,a.id_empresa, a.fecha_vencimiento
                FROM ddjjs a
                INNER JOIN ddjj_estados b ON b.id_ddjj_estado = a.id_ddjj_estado
                INNER JOIN acuerdos d ON d.id_acuerdo = a.id_acuerdo
                INNER JOIN ddjj_solicituds e on e.id_ddjj = a.id_ddjj
                WHERE a.id_empresa=7 and b.descripcion= 'Habilitado'";
                $ddjjs = DB::select($ddjj);
    
                   $empresa = " SELECT e.razon_social, e.nombre_comercial, e.nit, e.telefono, e.celular, e.email 
                   from empresas e 
                   where e.id_empresa = 2 ";
                   $empresas = DB::select($empresa);
                   ////////////
                   
                   $baja="SELECT row_number() OVER () as number_row, a.id_ddjj, b.id_ddjj_estado, a.numero_ddjj, b.descripcion as estado_descripcion, a.id_ddjj_tipo,
                             d.id_acuerdo, d.sigla, (d.sigla ||'-'|| d.acuerdo) as acuerdo_sigla, a.num_solicitud_ddjj, a.fecha_baja
                            FROM ddjjs a
                            INNER JOIN ddjj_estados b ON b.id_ddjj_estado = a.id_ddjj_estado
                            INNER JOIN acuerdos d ON d.id_acuerdo = a.id_acuerdo   
                             WHERE a.id_empresa=2 and b.descripcion= 'Baja'";
                  $bajas = DB::select($baja);
                
           $pdf= \PDF::loadView('reportes/ddjj',['empresas'=>$empresas,'ddjjs'=>$ddjjs,'bajas'=>$bajas]);
       
            return $pdf->download('ddjj.pdf');
                 
        }
        public function export() 
        {
            
       return Excel::download(new DdjjExport, 'Ddjj.xlsx');
                    



        }
    
        }
    



