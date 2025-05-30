@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Category Header -->
    <div class="bg-gray-100 rounded-lg p-8 mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $category->name }}</h1>
        <p class="text-gray-600 text-lg">{{ $category->description }}</p>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 100) }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-gray-800">${{ number_format($product->price, 2) }}</span>
                    <a href="{{ route('product.show', $product->id) }}" 
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        View Details
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection 