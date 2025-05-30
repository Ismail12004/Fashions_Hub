@extends('layouts.app')

@section('content')
    <h2>Courses</h2>

    <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary mb-3">Add Course</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>name</th><th>category_id</th><th>price</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
            
                      <a href="{{ route('dashboard.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                    <<a href="{{ route('dashboard.products.show', $product->id) }}" class="btn btn-sm btn-info">Details</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
