@extends('layouts.admin_layout')

@section('content')
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2><b>Материалы товаров</b></h2>
                </div>
                <div class="col-sm-7">
                    <a href="{{ route('materials.create') }}" class="btn btn-primary">
                        <i class="material-icons">&#xE147;</i><span>Добавить материал</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Наименование</th>
                <th>ЧПУ</th>
                <th>Наличие товаров</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody id="main-table">
            @foreach($materials as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->mat_name }}</td>
                    <td>{{ $material->mat_code }}</td>
                    <td class="comment-active">
                        @if(count($material->products()->get()) > 0)
                            <span class="status text-success">&bull;</span>
                        @else
                            <span class="status text-danger">&bull;</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('materials.edit', ['id'=>$material->id]) }}" class="settings" title="Редактировать" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        <a href="" id="material-delete" class="material-delete"><i class="material-icons" title="Удалить">&#xE5C9;</i>
                            <form class="form-delete" action="{{ route('materials.destroy', ['id'=>$material->id]) }}" method="post">
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
            <div class="hint-text">Показано <b>{{ $materials->count() }}</b> из <b>{{ $materials->total() }}</b> материалов</div>
            <div class="pagination">
                {{ $materials->fragment('main-table')->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection