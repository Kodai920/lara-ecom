@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{isset($product)? 'Edit Product' : 'Create Product'}}</div>

    <div class="card-body">
        @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger"> {{$error}} </li>
            @endforeach
        </ul>
        @endif

        <form action=" {{isset($product) ? route('products.update',['id' => $product->id]) : route('products.store')}} " method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value=" {{isset($product)? $product->name : ''}} ">
            </div>

            <div class="form-group">
                <label for="description">Description</label><br>
                <textarea name="description" cols="30" rows="5" class="form-control">{{isset($product)?$product->description : ''}} </textarea>
            </div>

            <div class="form-group">
                <label for="description">Featured image</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="price">Price</label><br>
                <input type="number" name="price" class="form-controller" value="{{isset($product) ? $product->price : '' }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">{{isset($product) ? 'Update Product' : 'Store Product'}}</button>
            </div>
        </form>
    </div>
</div>

@endsection