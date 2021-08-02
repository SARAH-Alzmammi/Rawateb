@extends('layouts.app')
@section('title',__('Dashboard'))



@section('content')

<div class="container">
   <div class="container">    <h3 class="text-success mb-3 border-bottom">{{__('Dashboard')}}</h3>

 <div class="row align-items-center gap-5">
   <div class="col-md-12">
<a class="btn btn-outline-success w-100" href="{{route('employess.index')}}">Employees</a>
   </div>
   <div class="col-md-12">
    <a class="btn btn-outline-success w-100" href="{{route('monthly.index')}}">Monthly</a>   </div>
 </div>
</div>

@endsection