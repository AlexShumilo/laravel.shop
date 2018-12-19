@extends('layouts.admin_layout')

@section('content')
    <h2>Редактировать категорию</h2>
    <hr>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('categories.update', ['id'=>$category->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="prod_name">Наименование категории</label>
                <input type="text" name="cat_name" class="form-control" id="cat_name" value="{{ $category->cat_name }}" aria-describedby="nameHelp" required>
                <small id="nameHelp" class="form-text text-muted"><b>Наименование категории должно содержать не более 25 символов</b></small>
            </div>
            <div class="form-group col-md-6">
                <label for="cat_code">ЧПУ-код категории</label>
                <input type="text" name="cat_code" class="form-control" id="cat_code" value="{{ $category->cat_code }}" aria-describedby="codeHelp" required>
                <small id="codeHelp" class="form-text text-muted"><b>ЧПУ-код категории должен быть уникальным</b></small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Отменить</a>
    </form>
@endsection