@extends('admin.maindesign')

@section('view_product')

@if(session('delete_product'))
    <div class="alert alert-success" role="alert">
        {{session('delete_product')}}
    </div>
@endif

<table class="table table-bordered border-primary" style="width: 100%; border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
    <thead>
        <tr>
            <th style="padding: 12px 15px; text-align: left;">Product ID</th>
            <th style="padding: 12px 15px; text-align: left;">Product Name</th>
            <th style="padding: 12px 15px; text-align: left;">Product Description</th>
            <th style="padding: 12px 15px; text-align: left;">Product Stock</th>
            <th style="padding: 12px 15px; text-align: left;">Product Price</th>
            <th style="padding: 12px 15px; text-align: left;">Product Category</th>
            <th style="padding: 12px 15px; text-align: left;">Product Image</th>
            <th style="padding: 12px 15px; text-align: left;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px 15px;">{{$product->id}}</td>
            <td style="padding: 12px 15px;">{{$product->product_title}}</td>
            <td style="padding: 12px 15px;">{{$product->product_description}}</td>
            <td style="padding: 12px 15px;">{{$product->product_stock}}</td>
            <td style="padding: 12px 15px;">{{$product->product_prices}}</td>
            <td style="padding: 12px 15px;">{{$product->product_category}}</td>
            <td style="padding: 12px 15px;">
                <img src="{{asset('products/'.$product->product_image)}}" alt="" style="width: 100px; height: 100px;">
            </td>
            <td style="padding: 12px 15px;">
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
