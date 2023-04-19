@extends('products.app')
@section('content')
<div class="row">
    <a class="btn btn-primary" href="{{url('/')}}">Home</a>
</div>
    <div class="row">
        <a class="btn btn-primary" href="{{url('/products')}}">Product Index</a>
    </div>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Product's Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Product's Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Image">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Product's Price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Product's Description:</strong>
                    <input type="text" name="desc" class="form-control" placeholder="Desc">
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
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <button type="submit">Create</button>
            </div>
        </div>
    </form>
@endsection