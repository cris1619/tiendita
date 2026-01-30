@extends('admin.maindesign')

@section('view_category')

@if(session('delete_category'))
    <div class="alert alert-success" role="alert">
        {{session('delete_category')}}
    </div>
@endif

<table class="table table-bordered border-primary" style="width: 100%; border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
    <thead>
        <tr>
            <th style="padding: 12px 15px; text-align: left;">Category ID</th>
            <th style="padding: 12px 15px; text-align: left;">Category Name</th>
            <th style="padding: 12px 15px; text-align: left;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px 15px;">{{$category->id}}</td>
            <td style="padding: 12px 15px;">{{$category->category}}</td>
            <td style="padding: 12px 15px;">
                <a href="{{route('admin.updatecategory',$category->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('admin.deletecategory',$category->id)}}" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
