@extends('admin.maindesign')

@section('add_product')

@if(session('product_message'))
    <div class="alert alert-success" role="alert">
        {{session('product_message')}}
    </div>
@endif
<div class="container-fluid">
    <form style="margin-top: 20px;" action="{{route('admin.postaddproduct')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input style="margin-bottom: 20px;" type="text" name="product_title" placeholder="Product Name"> <br>
        <textarea style="margin-bottom: 20px;" name="product_description" id="" cols="30" rows="10">
            Product Description
        </textarea> <br>
        <input style="margin-bottom: 20px;" type="number" name="product_stock" placeholder="Product Stock"> <br>
        <input style="margin-bottom: 20px;" type="number" name="product_prices" placeholder="Product Price"> <br>
        <input style="margin-bottom: 20px;" type="file" name="product_image" placeholder="Product Image"> <br>
        <select style="margin-bottom: 20px;" name="product_category"> <br>
            @foreach($categories as $category)
                <option value="{{$category->category}}">{{$category->category}}</option> <br>
            @endforeach
        </select> <br>
        <input style="margin-bottom: 20px;" type="submit" name="submit" value="Add Product">
    </form>

</div>

@endsection