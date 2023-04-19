@extends('products.app')
@section('content')
<div class="row">
    <a class="btn btn-success" href="{{url('products/create')}}">Create New Product</a>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Category</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $prod)
    <tr>
        <td>{{$prod->id}}</td>
        <td>{{$prod->name}}</td>
        <td><img src="/images/{{$prod->image}}" width="200px"></td>
        <td>{{$prod->price}}</td>
        <td>{{$prod->category->name}}</td>
        <td>{{$prod->desc}}</td>
        <td>
            <form action="{{route('products.destroy',$prod->id)}}" method="POST">
            <a class="btn btn-info" href="{{route('products.show',$prod->id)}}">Detail</a>
            <a class="btn btn-info" href="{{route('products.edit',$prod->id)}}">Edit</a>
          
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection