@extends('posts.app')
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
        <td>{{$prod->image}}</td>
        <td>{{$prod->price}}</td>
        <td>{{$prod->category->name}}</td>
        <td>{{$prod->desc}}</td>
        <td>
            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
            <a class="btn btn-info" href="{{route('posts.show',$post->id)}}">Detail</a>
            <a class="btn btn-info" href="{{route('posts.edit',$post->id)}}">Edit</a>
          
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection