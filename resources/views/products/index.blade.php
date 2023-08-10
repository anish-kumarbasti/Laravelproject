@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-center">Laravel 10 CRUD</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success p-2 my-2" href="{{ route('products.create') }}"> Create Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
<script>
    setTimeout(function() {
        document.querySelector('.alert').style.display = 'none';
    }, 2000);
</script>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Are you Sure you want to delete this item ?')" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $products->links() }}

@endsection