<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelDdjjExport implements FromView
{ 
    
    public function view(): View
    {
        return view('reportes/ddjj', [
            'ddjjs' => Ddjjs::all()
        ]);
    }
 
}


