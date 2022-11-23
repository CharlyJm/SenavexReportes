@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="col-md-2">
                       <form action="{{url('paises/export')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">Exportar Paises</button>
                           
                       </form>
                    </div>
               
                    <div class="col-md-2">
                       <form action="{{url('empresass/export')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">Exportar Empresas</button>
                       </form>
                    </div>
<!-- 
                    ///// -->
                    
                    <h1> DDJJ   PDF</h1>
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
                       <form action="{{url('index/RRCO')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">index</button>
                       </form>
                    </div>
                    <div class="col-md-2">
                       <form action="{{url('PDF/RRCO')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">pdf</button>
                       </form>
                       
                    </div>
                    
                    <div class="col-md-2">
                       <form action="{{url('export/RRCO')}}" enctype="multipart/form-data">
                           <button class="btn btn-success">EXCEL</button>
                       </form>
                    </div>
        <!-- <user-component> </user-component> -->
        <!-- <listado-component> </listado-component> -->
        <empresas-component> </empresas-component>
        </div>
    </div>
</div>
@endsection
