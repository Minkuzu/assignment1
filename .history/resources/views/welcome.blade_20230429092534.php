@extends('app')
@section('content')
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block p-2 bd-highlight">
                @auth
                    <p>You're logged in</p>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    @endif 
                @endauth
            </div>
            
        </div>
        @endif
    </div>
</body>
<div class= "container">
    <div class= "row" style= "margin:20px;">
        <div class= "col-12">
            <div class= "card">
                <div class= "card-header">
                    <h2>Homepage</h2>
                </div>
                <div class="card-body">
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
                                    <td>{{$prod->price}}$</td>
                                    <td>{{$prod->category->name}}</td>
                                    <td>{{$prod->desc}}</td>
                                    <td>
                                        <p class="btn-holder">
                                            <a href="{{ route('add_to_cart', $prod->id) }}" class="btn btn-primary btn-block text-center" role="button">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</a> 
                                            {{-- <form action="{{route('cart.store')}}" method="POST">
                                            @csrf
                                            <button type="submit">Add To Cart!!</button>
                                            </form> --}}
                                        </p>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <div style="margin-left:40%">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

