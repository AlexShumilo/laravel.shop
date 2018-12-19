@extends('layouts.admin_layout')

@section('content')
    <div>
        <h2>Детальный просмотр товара</h2>
        <hr>
        <h4><span class="attribute">Наименование: </span>{{ $product->prod_name }}</h4>
        <div class="news-image">
            <img src="{{ $product->preview }}" alt="Обложка">
        </div>
        <p><span class="attribute">Производитель: </span>{{ $product->prod_firm }}</p>
        <div><span class="attribute">Описание: </span>{!! $product->prod_description !!}</div>
        <p><span class="attribute">Материал: </span>{{ $product->material->mat_name }}</p>
        <p><span class="attribute">Категория: </span>{{ $product->category->cat_name }}</p>
        <p><span class="attribute">Цена: </span>{{ $product->cost }} грн.</p>
        <p><span class="attribute">ЧПУ-код: </span>{{ $product->prod_code }}</p>
        <a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="btn btn-primary">Редактировать</a>
    </div>
@endsection