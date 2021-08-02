@extends('layouts.app')

@section('content')

    <div class="container">    <h3 class="text-success mb-3 border-bottom">{{$month[0]['created_at']->format('m/Y')}}</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">OverTime</th>
                <th scope="col">Discount</th>

            </tr>
            </thead>
            <tbody>
                
@foreach($month as $employee)
           <tr>
  
           <td>{{$employee['employees_name']}}</td>
           <td>{{$employee['overtime']}}</td>
           <td>{{$employee['discount']}}</td>
     

           </tr>
         @endforeach  
  
            </tbody>
           </table>
           <a href="{{route('monthly.index')}}" class="btn btn-outline-secondary ">Back</a>
    </div>
@endsection
