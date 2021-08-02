@extends('layouts.app')
@section('title',__('Employess'))



@section('content')
<div class="container">

    
<table class="table" id="tbl_exporttable_to_xls">
    <thead>
    <tr>
      <th scope="col">{{__('Name')}}</th>
      <th scope="col">{{__('basic')}}</th>
      <th scope="col">{{__('Housing Allowance')}}</th>
      <th scope="col">{{__('Transportation Allowance')}}</th>
      <th scope="col">{{__('Total')}}</th>
      <th scope="col">{{__('Overtime')}}</th>
      <th scope="col">{{__('Discount')}}</th>
      <th scope="col">{{__('insurance')}}</th>
      <td>{{__('Net')}}</td>

   
    </tr>
    </thead>
    <tbody>
   
    @foreach($table as $key=>$employee)
   <tr>
   
   <td>{{$employee[0]['name']}}</td>
   <td>{{$employee[0]['basic']}}</td>
   <td>{{$employee[0]['residencyAllowance']}}</td>
   <td>{{$employee[0]['transportationAllowance']}}</td>
   <td>{{$employee[0]['original']}}</td>

   <td>{{
      round((((($employee[0]['basic']/$number_of_days/$employee[0]['hours'])/2)+
          (($employee[0]['actual'] / $number_of_days)/ $employee[0]['hours']))*$employee['overtime']),2)
       
       
       }}</td>

   <td>{{round($employee['discount'] * (($employee[0]['actual'] / $number_of_days)/ $employee[0]['hours']),2)}}</td>

   <td>{{$employee[0]['insurance']}}</td>

   <td>{{(($employee[0]['actual'])-(round($employee['discount'] * (($employee[0]['actual'] / $number_of_days)/ $employee[0]['hours']),2)))+   round((((($employee[0]['basic']/$number_of_days/$employee[0]['hours'])/2)+
    (($employee[0]['actual'] / $number_of_days)/ $employee[0]['hours']))*$employee['overtime']),2)
 }}</td>
   </tr>
   
    @endforeach 
   
    </tbody>
   </table>
   <button class="btn btn-outline-success mb-3" onclick="ExportToExcel()">Download As Excel</button>
<br>
   <a href="{{route('monthly.index')}}" class="btn btn-outline-secondary ">Back</a>
</div>
@endsection

