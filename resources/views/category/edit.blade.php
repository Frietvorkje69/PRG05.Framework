@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h1>Edit category</h1>
                    </div>
                    <div class="card-body">
                        <form action="/categories/{{$category->id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <input id="id"
                                   name="id"
                                   type="hidden"
                                   value="{{$category->id}}}">
                            <label for="name">Name: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{old("name", $category->name)}}"
                                   class="input-group input-group-text @error("name") is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="description">Description: </label>
                            <input id="description"
                                   name="description"
                                   type="text"
                                   value="{{old("description", $category->description)}}"
                                   class="input-group input-group-text @error("description") is-invalid @enderror">
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <br>
                            <input class="btn btn-primary" type="submit" value="Save changes">
                        </form>
                    </div>
                </div>
                <br>
                @can('delete', $category)
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h1>Delete product</h1>
                        </div>
                        <div class="card-body">
                            <h5>Are you sure you want to delete, {{$category->name}}?</h5>
                            <br>
                            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input id="id"
                                       name="id"
                                       type="hidden"
                                       value="{{$category->id}}">
                                <input type="submit" value="Yes, I'm sure" class="btn btn-warning" >
                            </form>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
@endsection