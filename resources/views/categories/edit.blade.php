@extends('categories.app')
@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header">
        <h2>Edit Category</h2>
        <br>
        <a class="btn btn-primary" href="{{url('/')}}">Home</a>
        <a class="btn btn-primary" href="{{url('/categories')}}">Category Index</a>
        <br>
        <br>
    </div>
    <div class="card-body">
        <form action="{{route('categories.update',$category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Category's Name:</strong>
                        <br>
                        <br>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Name">
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Description:</strong>
                        <br>
                        <br>
                        <input type="text" name="desc" class="form-control" value="{{$category->desc}}" placeholder="Description">
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button class="btn btn-primary" type="submit">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection