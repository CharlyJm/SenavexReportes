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

class DdjjExport implements  Responsable, WithTitle, FromView,ShouldAutoSize
{
    use Exportable;
    public function view(): View
    {
        $empresas=DB::select (" SELECT e.razon_social, e.nombre_comercial, e.nit, e.telefono, e.celular, e.email 
            from empresas e 
            where e.id_empresa = 2 ");
            
         $ddjjs=DB::select("SELECT row_number() OVER () as number_row,  a.id_ddjj, b.id_ddjj_estado, a.numero_ddjj, b.descripcion as estado_descripcion, a.id_ddjj_tipo, d.id_acuerdo, d.sigla, (d.sigla ||'-'|| d.acuerdo) as acuerdo_sigla, a.fecha_aprobacion,a.id_empresa, a.fecha_vencimiento
                    FROM ddjjs a
                    INNER JOIN ddjj_estados b ON b.id_ddjj_estado = a.id_ddjj_estado
                    INNER JOIN acuerdos d ON d.id_acuerdo = a.id_acuerdo
                    INNER JOIN ddjj_solicituds e on e.id_ddjj = a.id_ddjj
                    WHERE a.id_empresa=7 and b.descripcion= 'Habilitado'");
       $bajas=DB::select("SELECT row_number() OVER () as number_row, a.id_ddjj, b.id_ddjj_estado, a.numero_ddjj, b.descripcion as estado_descripcion, a.id_ddjj_tipo,  d.id_acuerdo, d.sigla, (d.sigla ||'-'|| d.acuerdo) as acuerdo_sigla, a.num_solicitud_ddjj, a.fecha_baja
                    FROM ddjjs a
                    INNER JOIN ddjj_estados b ON b.id_ddjj_estado = a.id_ddjj_estado
                    INNER JOIN acuerdos d ON d.id_acuerdo = a.id_acuerdo   
                     WHERE a.id_empresa=2 and b.descripcion= 'Baja'");
       
       return view('reportes.ddjjs', [
            'ddjjs'=>$ddjjs,
            'empresas'=>$empresas,
            'bajas'=>$bajas
      
                   

                    

         
                    
      
    ]);
}
public function title(): string
{
    return 'Reporte de asistencia mensual';
}
}