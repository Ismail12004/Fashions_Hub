@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
   
    <div class="mb-4">
    <img src="{{ asset('storage/products/products/mens/i1.jpg') }}" alt="{{ $product->name }}">



    </div>

 
    <h2 class="mb-3">{{ $product->name }}</h2>

   
    <p class="lead">{{ $product->description }}</p>

 
    <p class="h5"><strong>السعر:</strong> ${{ $product->price }}</p>

    <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary mt-4">رجوع إلى المنتجات</a>
</div>
@endsection

