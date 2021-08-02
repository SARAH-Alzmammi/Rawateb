@extends('layouts.app')
@section('title',__('Employess'))



@section('content')

<div class="container">
    <h3 class="text-success mb-3 border-bottom">{{__('Monthly')}}</h3>
    @if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{$error}}
  </div>
@endforeach
@endif

    <a  class="btn btn-outline-success mb-5"href="{{route('monthly.create')}}">Create </a>

    @if(count($monthly) > 0)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Month</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($monthly as $date=>$month) 
       <tr>
       <td>
           <a class = "link-dark"href="{{route('monthly.show', $date)}}">
           {{date('m/Y ', strtotime($date))}}</a>
        
        </td>
           <td>

           <form action="{{route('monthly.show', $date)}}"   style="display: inline-block" method="post">
               @method('DELETE')
               @csrf
               <button class="btn btn-outline-danger"  onclick="  return confirm('Are you sure?')">Delete</button>
               </form>
               <a class="btn btn-outline-success" href="{{route('table', $date)}}">Print</a>
           </td>
       </tr>
       
        @endforeach 
       
        </tbody>
       </table>
       @else
       <div class="alert alert-secondary" role="alert">
        {{__('Yon Did Not Add Any Month Yet.')}}
      </div>
       <a href="{{route('dashboard')}}" class="btn btn-outline-secondary ">Back</a>
       
</div>
@endif
@endsection
