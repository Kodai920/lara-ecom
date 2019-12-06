@extends('layouts.app')
@section('content')

<table class="table table-hover">
    <thead>
        <th>Name</th>
        <th>Price</th>
        <th colspan=3 class="text-center">Action</th>
    </thead>
    <tbody>
        @foreach($products as $product)
          <tr>
              <td> {{$product->name}} </td>
              <td> {{$product->price}} </td>
              <td>
                <a href=" {{route('products.show',['id'=>$product->id])}} " class="btn btn-primary">Show</a>
              </td>
              <td>
                <a href=" {{route('products.edit',['id'=>$product->id])}} " class="btn btn-info">Edit</a>
              </td>
              <td>
                  <form action=" {{route('products.destroy',['id'=>$product->id])}} " method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </td>
          </tr>
        @endforeach
    </tbody>
</table>

@endsection