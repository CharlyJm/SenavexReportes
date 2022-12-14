@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!-- <div class="col-md-2">
                       <form action="{{url('paises/export')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">Exportar Paises</button>
                           
                       </form>
                    </div> -->
               
                    <!-- <div class="col-md-2">
                       <form action="{{url('empresass/export')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">Exportar Empresas</button>
                       </form>
                    </div>

                    ///// -->
                    
                    <!-- <h1> DDJJ   PDF</h1>
                    <div class="col-md-2">
                       <form action="{{url('PDF')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">pdf</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('index')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">index</button>
                       </form>
                    </div>
                    <div class="col-md-2">
                       <form action="{{url('export')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">Exportar ddjj</button>
                       </form>
                    </div>

                          <h1> RRCO REPORTES</h1>
                
                    <div class="col-md-2">
                       <form action="{{url('rrco')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">RRCO PDF</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('rrcoEXCEL')}}" enctype="multipart/form-data">
                           <button class="btn btn-success"> RRCO EXCEL</button>
                       </form>
                    </div>
-->
                 <h1> SEGUIMIENTO DE DDJJ - EST LISTO</h1>
                  
                    <!-- <div class="col-md-2">
                       <form action="{{url('sddjj')}}" enctype="multipart/form-data">
                            <button class="btn btn-success">pdf</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('exce')}}" enctype="multipart/form-data">
                           <button class="btn btn-success"> ----EXCEL</button>
                       </form>
                    </div> -->



                     <h1> REGISTRO DE SOLICITUD DDJJ SGC</h1>
                    
                    <div class="col-md-2">
                       <form action="{{url('sgcddjj')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">PDF</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('excel')}}" enctype="multipart/form-data">
                           <button class="btn btn-success"> EXCEL</button>
                       </form>
                    </div>

<!-- 
                     <h1> REGISTRO DE SOLICITUD CO</h1>
                    
                    <div class="col-md-2">
                       <form action="{{url('sgcco')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">PDF</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('sgccoEXCEL')}}" enctype="multipart/form-data">
                           <button class="btn btn-success"> EXCEL</button>
                       </form>
                    </div>
                     -->

                    <h1>  SEGUIMIENTO A CERTIFICADOS DE ORIGEN</h1>
                    
                    <div class="col-md-2">
                       <form action="{{url('sco')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">pdf</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('excel')}}" enctype="multipart/form-data">
                           <button class="btn btn-success"> EXCEL</button>
                       </form>
                    </div>

                    

                    <!-- <h1> RREP  EMISION DE CERTIFICADO DE CAFE</h1>
                    
                    <div class="col-md-2">
                       <form action="{{url('oic')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">PDF</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('oicEXCEL')}}" enctype="multipart/form-data">
                           <button class="btn btn-success"> EXCEL</button>
                       </form> 
                    </div>  -->
                    
<!--  
                           <h1> REPORTE DE DECLARACIÓN  JURADA DE ORIGEN- YA ESTA LSTO</h1>
                    
                    <div class="col-md-2">
                       <form action="{{url('ddjj')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">PDF</button>
                       </form>
                       
                    </div> -->
                    
                    <!-- <div class="col-md-2">
                       <form action="{{url('ddjjexcel')}}" enctype="multipart/form-data">
                           <button class="btn btn-success"> EXCEL</button>
                       </form>
                    </div> -->
                    <!-- <h1> VENTAS DE CERTIFICADO OIC</h1>
                    
                    <div class="col-md-2">
                       <form action="{{url('voic')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">PDF</button>
                       </form>
                       
                    </div>
                    <div class="col-md-2">
                       <form action="{{url('excel')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">excel  </button>
                       </form>
                       
                    </div>
                   
                    <h1> REPORTE DE EMISION DE CERTIFICADOS DE ORIGEN </h1>
                    
                    <div class="col-md-2">
                       <form action="{{url('reco')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">PDF</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('recoEXCEL')}}" enctype="multipart/form-data">
                           <button class="btn btn-success"> EXCEL</button>
                       </form>
                    </div>
                    <h1> REPORTE DE ANULACION DE CERTIFICADO DE ORIGEN </h1>
                    
                    <div class="col-md-2">
                       <form action="{{url('raco')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">PDF</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('racoexcel')}}" enctype="multipart/form-data">
                           <button class="btn btn-success"> EXCEL</button>
                       </form>
                    </div> -->
    </div>
</div>
@endsection

