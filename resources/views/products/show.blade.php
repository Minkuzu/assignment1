@extends('products.app')
@section('content')
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{url('/')}}">Home</a>
                    <a class="btn btn-primary" href="{{url('/products')}}">Product Index</a>
                    <br>
                    <br>
                    <h2>Product {{$product->id}} Information</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route('products.edit',$product->id)}}">Edit</a>
                    <br>
                    <br>
                    <h5 class="card-title">ID :  {{$product->id}}</h5>
                    <p class="card-text">Name :  {{$product->name}}</p>
                    <img src="/images/{{$product->image}}" class="img-thumbnail">
                    <br>
                    <br>
                    <p class="card-text">Price :  ${{$product->price}}</p>
                    <p class="card-text">Category :  {{$product->category->name}}</p>
                    <p class="card-text">Description :  {{$product->desc}}</p>
                    <form action="{{route('products.destroy',$product->id)}}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger" class="float-end" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection