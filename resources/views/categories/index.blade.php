@extends('categories.app')
@section('content')
<div class= "container">
    <div class= "row" style= "margin:20px;">
        <div class= "col-12">
            <div class= "card">
                <div class= "card-header">
                    <h2>Category Management</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-success btn-sm" href="{{url('categories/create')}}">Create New Category</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->desc}}</td>
                                    <td>{{$cat->created_at->diffForHumans()}}</td>
                                    <td>
                                        <form action="{{route('categories.destroy',$cat->id)}}" method="POST">
                                        <a class="btn btn-info" href="{{route('categories.show',$cat->id)}}">Detail</a>
                                        <a class="btn btn-primary" href="{{route('categories.edit',$cat->id)}}">Edit</a>
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