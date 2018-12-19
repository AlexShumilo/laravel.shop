@extends('layouts.shop_layout')

@section('content')
    <div class="row">
        <div class="col-md-3 categories-list">
            @include('layouts.categories_sidebar')
        </div>
        <div class="col-md-9">
            <div id="products-list" class="row products-list">
                @foreach($products as $product)
                <a href="{{ route('product.detail', ['cat_code'=>$product->category->cat_code, 'prod_code'=>$product->prod_code]) }}" class="product-link col-md-4">
                    <div class="product-card">
                        <img src="{{ $product->preview }}" alt="">
                        <h5>{{ $product->prod_name }}</h5>
                        <p>Материал: {{ $product->material->mat_name }}</p>
                        <p>Цена: {{ $product->cost }}</p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="pagination paginator-block">
                {{ $products->fragment('products-list')->links() }}
            </div>
        </div>
    </div>
@endsection