@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
   
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

    </div>
</div>
@endsection

