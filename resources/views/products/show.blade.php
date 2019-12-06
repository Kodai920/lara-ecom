@extends('layouts.app')
@section('content')

<h1 class="text-center"> {{$product->name}} </h1>
<div class="text-center my-3"> <img src=" {{asset($product->image)}} " height="40%" width="60%" > </div>

<div class="card">
    <div class="card-header">Description</div>
    <div class="card-body">
        <div> {!! $product->description !!} </div>
        <hr>
        <a href="{{route('products.index')}}" class="btn btn-secondary float-right">Back</a>
    </div>
</div>



@endsection