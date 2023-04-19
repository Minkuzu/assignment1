@extends('products.app')
@section('content')
    <div class="row">
        <a class="btn btn-primary" href="{{url('/')}}">Home</a>
    </div>
    <div class="row">
        <a class="btn btn-primary" href="{{url('/products')}}">Product Index</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Description</th>
        </tr>
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td><img src="/images/{{$product->image}}" width="250px"></td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->desc}}</td>
    </table>
@endsection