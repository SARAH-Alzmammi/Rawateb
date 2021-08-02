@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 class="text-success mb-3 border-bottom">{{__('Add  An Employee')}}</h3>
    <form action="{{route('employess.store')}}" method="post" >
       @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{__('Name')}}</label>
            <input type="name" class=" form-control  " id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="original" class="form-label">{{__('Original')}}</label>
            <input type="number" class=" form-control  " name="original">
        </div>
        <div class="mb-3">
            <label for="hours" class="form-label">{{__('Hours')}}</label>
            <input type="number" class=" form-control  " name="hours" value=8>
        </div>

        <button type="submit" class="btn btn-success  text-light">{{__('Add')}}</button>
        <br>
        <a href="{{route('employess.index')}}" class="btn btn-outline-secondary mt-4">Back</a>
    </form>
    </div>
@endsection
