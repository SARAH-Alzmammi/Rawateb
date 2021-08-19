@extends('dashboard')

@section('options')

    <div class="container">
        <h3 class="text-success mb-3 border-bottom grayblueText">{{__('Create a Month')}}</h3>
        @if(count($employees) > 0)
        <form action="{{route('monthly.store')}}" method="post">
            @csrf

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">OverTime</th>
                <th scope="col">Discount</th>
            </tr>
            </thead>
            <tbody>

            @foreach($employees as $Key=>$employee)
           <tr>
           <td>{{$employee['name']}}<input type="hidden" name="monthly[{{$employee['id']}}][employees_name]" value="{{$employee['name']}}"></td>
  

        
           <td><input  class="form-control" type="number" name="monthly[{{$employee['id']}}][overtime]" value=0 id={{$employee['id']}}></td>
           <td><input  class="form-control" type="number" name="monthly[{{$employee['id']}}][discount]" value=0 id={{$employee['id']}}></td>

           </tr>
           
            @endforeach 

     

           
            </tbody>
           </table>
           <button class="btn btn-backgraound w-25  text-light mb-3" type="submit">Save</button>
       
        </form>
        @else
        <div class="alert alert-secondary" role="alert">
            {{__('Yon Do Not have any  employees Please add Them first!.')}}
          </div>
          @endif
          <a href="{{route('monthly.index')}}" class="btn btn-outline-secondary w-25 ">Back</a>
    </div>
@endsection
