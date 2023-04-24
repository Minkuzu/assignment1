@extends('products.app')
@section('content')
<div class= "container">
    <div class= "row" style= "margin:20px;">
        <div class= "col-12">
            <div class= "card">
                <div class= "card-header">
                    <h2>Product Management</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-success btn-sm" href="{{url('products/create')}}">Create New Product</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $prod)
                                <tr>
                                    <td>{{$prod->id}}</td>
                                    <td>{{$prod->name}}</td>
                                    <td><img src="/images/{{$prod->image}}" width="250px"></td>
                                    <td>{{$prod->price}}</td>
                                    <td>{{$prod->category->name}}</td>
                                    <td>{{$prod->desc}}</td>
                                    <td>
                                        <form action="{{route('products.destroy',$prod->id)}}" method="POST">
                                        <a class="btn btn-info" href="{{route('products.show',$prod->id)}}">Detail</a>
                                        <a class="btn btn-primary" href="{{route('products.edit',$prod->id)}}">Edit</a>
                                    
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                        </form>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection