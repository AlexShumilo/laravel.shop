@extends('layouts.shop_layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('layouts.categories_sidebar')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-5 product">
                    <img src="{{ $product->preview }}" alt="">
                </div>
                <div class="col-md-6 product-description">
                    <h4>{{ $product->prod_name }}</h4>
                    <p><b>Материал:</b> {{ $product->material->mat_name }}</p>
                    <p><b>Производитель:</b> {{ $product->prod_firm }}</p>
                    <p><b>Описание:</b> {{ $product->prod_description }}</p>
                    <p><b>Цена:</b> {{ $product->cost }} грн.</p>
                </div>
            </div>
        </div>
    </div>
@endsection