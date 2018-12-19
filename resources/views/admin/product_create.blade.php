@extends('layouts.admin_layout')

@section('content')
    <h2>Добавить товар</h2>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="prod_name">Наименование товара</label>
                <input type="text" name="prod_name" class="form-control" id="prod_name" value="{{ old('prod_name') }}" aria-describedby="nameHelp" placeholder="Ведите наименование товара" required>
                <small id="nameHelp" class="form-text text-muted"><b>Наименование товара должно содержать не более 25 символов</b></small>
            </div>
            <div class="form-group col-md-6">
                <label for="prod_firm">Производитель</label>
                <input type="text" name="prod_firm" class="form-control" id="prod_firm" value="{{ old('prod_firm') }}" aria-describedby="firmHelp" placeholder="Ведите производителя товара" required>
                <small id="firmHelp" class="form-text text-muted"><b>Наименование производителя товара должно содержать не более 25 символов</b></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="code">ЧПУ-код товара</label>
                <input type="text" name="prod_code" class="form-control" id="code" value="{{ old('prod_code') }}" aria-describedby="codeHelp" placeholder="Ведите ЧПУ-код товара" required>
                <small id="codeHelp" class="form-text text-muted"><b>ЧПУ-код товара должен быть уникальным</b></small>
            </div>
            <div class="form-group col-md-6">
                <label for="cost">Стоимость товара</label>
                <input type="number" name="cost" class="form-control" id="cost" value="{{ old('cost') }}" step="any" placeholder="Ведите стоимость товара" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="category">Категория</label>
                <select id="category" name="category" class="form-control" required>
                    <option selected>Выбрать...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="material">Материал</label>
                <select id="material" name="material" class="form-control" required>
                    <option selected>Выбрать...</option>
                    @foreach($materials as $material)
                        <option value="{{ $material->id }}">{{ $material->mat_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="text">Описание товара</label>
            <textarea class="form-control" name="prod_description" id="text" aria-describedby="textHelp" rows="10" placeholder="Введите описание товара" required>{{ old('prod_description') }}</textarea>
        </div>
        <div class="form-group col-md-5">
            <label>Изображение</label>
            <input type="file" name="image" class="form-control-file">
            <small id="fileHelp" class="form-text text-muted"><b>Допускаются файлы с одним из следующих расширений: jpeg, png, bmp, gif, svg</b></small>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection