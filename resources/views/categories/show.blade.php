@extends('categories.app')
@section('content')
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{url('/')}}">Home</a>
                    <a class="btn btn-primary" href="{{url('/categories')}}">Category Index</a>
                    <br>
                    <br>
                    <h2>Category {{$category->id}} Information</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route('categories.edit',$category->id)}}">Edit</a>
                    <br>
                    <br>
                    <h5 class="card-title">ID :  {{$category->id}}</h5>
                    <p class="card-text">Name :  {{$category->name}}</p>
                    <p class="card-text">Description :  {{$category->desc}}</p>
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
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