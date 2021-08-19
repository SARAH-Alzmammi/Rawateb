@extends('layouts.app')
@section('title',__('Employess'))



@section('content')
<div class="container d-flex justify-content-center flex-customize  gap-3">
<div class="align-self-center me-3">
 <h2 class="text-secondary grayblueText">Rawateb</h2>
 <p class="greenText">Tool to calculate and struct employee’s payroll every month in count on their overtime and absent hours</p>
</div>

<img src="{{URL::asset('image/home.svg')}}" class="img-fluid row align-self-center w-75 " alt="">
</div>


@endsection

