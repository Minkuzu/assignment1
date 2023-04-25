@extends('products.app')
@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header">
        <h2>Create Product</h2>
        <a class="btn btn-primary" href="{{url('/')}}">Home</a>
        <a class="btn btn-primary" href="{{url('/products')}}">Product Index</a>
        <br>
        <br>
    </div>
    <div class="card-body">
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Image:</strong>
                        <input type="file" name="image" class="form-control" placeholder="Image">
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Price:</strong>
                        <input type="text" name="price" class="form-control" placeholder="Price">
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Description:</strong>
                        <input type="text" name="desc" class="form-control" placeholder="Desc">
                        <br>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Product's Category:</strong>
                        <select name="category_id">
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                    </div>
                </div>
                <br>
                <div class="col-md-12 col-sm-12">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
    
@endsection