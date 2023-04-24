@extends('products.app')
@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header">
        <a class="btn btn-primary" href="{{url('/')}}">Home</a>
        <a class="btn btn-primary" href="{{url('/products')}}">Product Index</a>
        <br>
        <br>
        <h2>Edit Product</h2>
    </div>
    <div class="card-body">
        <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Name:</strong>
                        <br>
                        <br>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="Name">
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Image:</strong>
                        <br>
                        <br>
                        <input type="file" name="image" class="form-control" value="{{$product->image}}" placeholder="Image">
                        <img src="/images/{{$product->image}}" width="250px">
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Price:</strong>
                        <br>
                        <br>
                        <input type="text" name="price" class="form-control" value="{{$product->price}}" placeholder="Price">
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Description:</strong>
                        <br>
                        <br>
                        <input type="text" name="desc" class="form-control" value="{{$product->desc}}" placeholder="Description">
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Select Category:</strong>
                        <select name="category_id">
                            @foreach ($categories as $item)
                                <option @selected($item->id == $product->category_id) 
                                    value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button class="btn btn-primary" type="submit">Edit</button>
                </div>
            </div>
        </form>
    </div>
    
@endsection