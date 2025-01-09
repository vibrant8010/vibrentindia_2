@extends('layouts.app')

@section('content')
    <h1>Search Results for "{{ $query }}"</h1>

    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <ul>
            @foreach($products as $product)
                <li>
                    <a href="/product/{{ $product->id }}">
                        {{ $product->name }} - {{ $product->company->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
