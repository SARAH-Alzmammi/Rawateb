@extends('dashboard')
@section('title',__('Employess'))



@section('options')

<div class="container">
    <h3 class="grayblueText mb-3 border-bottom">{{__('Employess')}}</h3>
    <a href="{{route('employess.create')}}" class="btn btn-outline-light border-color text-dark mb-3">Add New Employee</a>

    @if($employees->count() > 0)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('name')}}</th>
            <th scope="col">{{__('basic')}}</th>
            <th scope="col">{{__('Housing Allowance')}}</th>
            <th scope="col">{{__('Transportation Allowance')}}</th>
            <th scope="col">{{__('Total')}}</th>
            <th scope="col">{{__('insurance')}}</th>
            <th scope="col">{{__('Actual')}}</th>
            <td>{{__('Action')}}</td>
       
        </tr>
        </thead>
        <tbody>
       
        @foreach($employees as $Key=>$employee)
       
       
            <tr>
       
                <td>{{$Key+1}}</td>
                <td>{{$employee['name']}}</td>
                <td>{{$employee['basic']}}</td>
                <td>{{$employee['residencyAllowance']}}</td>
                <td>{{$employee['transportationAllowance']}}</td>
                <td>{{$employee['original']}}</td>
                <td>{{$employee['insurance']}}</td>
                <td>{{$employee['actual']}}</td>

       
               <td>  
             
                   <a href="{{route('employess.edit', $employee['id'])}}" class='btn btn-outline-warning mb-3 w-100'>Edit</a>
                   
                   <form action="{{route('employess.destroy', $employee['id'])}}"   class="w-100" method="post">
               @method('DELETE')
               @csrf
               <button class="btn btn-outline-danger w-100 "  onclick="  return confirm('Are you sure?')">Delete</button>
               </form></td>
       
       
            </tr>
        @endforeach
       
        </tbody>
       </table>

       


@else
<div class="alert alert-secondary" role="alert">
    {{__('Yon Do Not have any employees yet.')}}
  </div>
  
@endif

</div> 
@endsection
