@extends('layouts.app')
@section('title',__('Dashboard'))



@section('content')
<div class=" vh-100 ">
   <div class="row">


     <div class="col-2 vh-100  bg-light d-flex   align-content-center  flex-column ">
      <a class="btn btn-outline-ligth w-100 mb-5 border-color align-self-center" href="{{route('employess.index')}}">Employees</a>



      <a class="btn btn-outline-ligth border-color w-100 align-self-center" href="{{route('monthly.index')}}">Monthly</a> 
     </div>

     <div class="col-10  vh-100">
      @yield('options')
     </div>
   </div>
 </div>

@endsection