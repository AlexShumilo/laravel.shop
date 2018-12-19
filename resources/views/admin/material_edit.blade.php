@extends('layouts.admin_layout')

@section('content')
    <h2>Редактировать материал</h2>
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
    <form method="post" action="{{ route('materials.update', ['id'=>$material->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mat_name">Наименование материала</label>
                <input type="text" name="mat_name" class="form-control" id="mat_name" value="{{ $material->mat_name }}" aria-describedby="nameHelp" required>
                <small id="nameHelp" class="form-text text-muted"><b>Наименование материала должно содержать не более 25 символов</b></small>
            </div>
            <div class="form-group col-md-6">
                <label for="mat_code">ЧПУ-код материала</label>
                <input type="text" name="mat_code" class="form-control" id="mat_code" value="{{ $material->mat_code }}" aria-describedby="codeHelp" required>
                <small id="codeHelp" class="form-text text-muted"><b>ЧПУ-код материала должен быть уникальным</b></small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Отменить</a>
    </form>
@endsection