@extends('layouts.admin_layout')

@section('content')
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2><b>Товары</b></h2>
                </div>
                <div class="col-sm-7">
                    <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Добавить товар</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Наименование</th>
                <th>Производитель</th>
                <th>Описание</th>
                <th>Цена, грн.</th>
                <th>Изображение</th>
                <th>Категория</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody id="main-table">
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><a href="{{ route('products.show', ['id'=>$product->id]) }}">{{ $product->prod_name }}</a></td>
                    <td>{{ $product->prod_firm }}</td>
                    <td>{{ $product->prod_description }}</td>
                    <td>{{ $product->cost }}</td>
                    <td><img class="news_preview" src="{{ $product->preview }}" alt="Обложка"></td>
                    <td>{{ $product->category->cat_name }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="settings" title="Редактировать" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        <a href="" class="delete"><i class="material-icons">&#xE5C9;</i>
                            <form class="form-delete" action="{{ route('products.destroy', ['id'=>$product->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div id="paginator-block" class="clearfix">
            <div class="hint-text">Показано <b>5</b> из <b>{{ $products->total() }}</b> товаров</div>
            <div class="pagination">
                {{ $products->fragment('main-table')->links() }}
            </div>
        </div>
    </div>
@endsection