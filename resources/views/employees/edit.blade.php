@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 class="text-success mb-3 border-bottom">{{__('Edit  An Employee')}}</h3>
    <form action="{{route('employess.update',$employee['id'])}}" method="post" >
       @csrf
       @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">{{__('name')}}</label>
            <input type="name" class=" form-control  " id="name" name="name" value="{{$employee['name']}}">
        </div>
        <div class="mb-3">
            <label for="original" class="form-label">{{__('original')}}</label>
            <input type="number" class=" form-control  " name="original" value="{{$employee['original']}}" >
        </div>
        <div class="mb-3">
            <label for="hours" class="form-label">{{__('hours')}}</label>
            <input type="number" class=" form-control  " name="hours" value="{{$employee['hours']}}">
        </div>

        <button type="submit" class="btn btn-success  text-light">{{__('Update')}}</button>
    </form>
    <a href="{{route('employess.index')}}" class="btn btn-outline-secondary mt-4">Back</a>
    </div>
@endsection
