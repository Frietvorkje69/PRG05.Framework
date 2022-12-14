@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                @if (session('alert'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <h2>List of Categories</h2>
                <div>
                    @can('create', \App\Models\Category::class)
                        <btn class="btn btn-info"><a href="{{route('categories.create')}}" class="link page-link">Add
                                new category</a>
                        </btn>
                        <br>
                    @endcan
                    <br>
                    @foreach($categories as $category)
                        <div class="card">
                            <div class="card-header text-bg-dark"><h1><a class="link page-link"
                                                                         href="/categories/{{$category->id}}">{{$category->name}}</a>
                                </h1>
                                <div class="justify-content-end row row-cols-auto">
                                    @can('update', $category)
                                        <a class="btn btn-secondary btn-outline-light"
                                           href="/categories/{{$category->id}}/edit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body">
                                <p>{{$category->description}}</p>
                                @foreach($category->products as $product)
                                    <p><a href="/products/{{$product->id}}">{{$product->name}}</a></p>
                                @endforeach
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
