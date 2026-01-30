@extends('admin.maindesign')

<base href="/public">

@section('update_category')

@if(session('update_category'))
    <div class="alert alert-success" role="alert" style="margin-top: 20px;" background-color="green">
        {{session('update_category')}}
    </div>
@endif
<div class="container-fluid">
    <form action="{{route('admin.postupdatecategory',$category->id)}}" method="POST">
        @csrf
        <input type="text" name="category" value="{{$category->category}}">
        <input type="submit" name="submit" value="Update Category">
    </form>

</div>

@endsection