@extends('admin.maindesign')

@section('view_category')

<table class="table table-bordered border-primary" style="width: 100%; border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
    <thead>
        <tr>
            <th style="padding: 12px 15px; text-align: left;">Category ID</th>
            <th style="padding: 12px 15px; text-align: left;">Category Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px 15px;">{{$category->id}}</td>
            <td style="padding: 12px 15px;">{{$category->category}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
