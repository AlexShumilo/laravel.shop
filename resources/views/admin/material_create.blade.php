@extends('layouts.admin_layout')

@section('content')
    <h2>Добавить материал</h2>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('materials.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mat_name">Наименование материала</label>
                <input type="text" name="mat_name" class="form-control" id="mat_name" value="{{ old('mat_name') }}" aria-describedby="nameHelp" placeholder="Ведите наименование материала" required>
                <small id="nameHelp" class="form-text text-muted"><b>Наименование материала должно содержать не более 25 символов</b></small>
            </div>
            <div class="form-group col-md-6">
                <label for="mat_code">ЧПУ-код материала</label>
                <input type="text" name="mat_code" class="form-control" id="mat_code" value="{{ old('mat_code') }}" aria-describedby="codeHelp" placeholder="Ведите ЧПУ-код материала" required>
                <small id="codeHelp" class="form-text text-muted"><b>ЧПУ-код материала должен быть уникальным</b></small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection