@extends('products.app')
@section('content')
    <div class="row">
        <a class="btn btn-primary" href="{{url('/')}}">Home</a>
    </div>
    <div class="row">
        <a class="btn btn-primary" href="{{url('/products')}}">Product Index</a>
    </div>
    <form action="{{route('products.update',$product->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Product's Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="Name">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Product's Image:</strong>
                    <input type="file" name="image" class="form-control" value="{{$product->image}}" placeholder="Image">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Product's Price:</strong>
                    <input type="text" name="price" class="form-control" value="{{$product->price}}" placeholder="Price">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Product's Description:</strong>
                    <input type="text" name="desc" class="form-control" value="{{$product->desc}}" placeholder="Description">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Select Category:</strong>
                    <select name="category_id">
                        @foreach ($categories as $item)
                            <option @selected($item->id == $post->category_id) 
                                value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </div>
    </form>
@endsection