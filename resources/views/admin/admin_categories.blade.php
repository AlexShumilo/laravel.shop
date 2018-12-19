@extends('layouts.admin_layout')

@section('content')
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2><b>Категории товаров</b></h2>
                </div>
                <div class="col-sm-7">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">
                        <i class="material-icons">&#xE147;</i><span>Добавить категорию</span>
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
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->cat_name }}</td>
                    <td>{{ $category->cat_code }}</td>
                    <td class="comment-active">
                        @if(count($category->products()->get()) > 0)
                            <span class="status text-success">&bull;</span>
                        @else
                            <span class="status text-danger">&bull;</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', ['id'=>$category->id]) }}" class="settings" title="Редактировать" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        <a href="" id="category-delete" class="category-delete"><i class="material-icons" title="Удалить">&#xE5C9;</i>
                            <form class="form-delete" action="{{ route('categories.destroy', ['id'=>$category->id]) }}" method="post">
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
            <div class="hint-text">Показано <b>{{ $categories->count() }}</b> из <b>{{ $categories->total() }}</b> категорий</div>
            <div class="pagination">
                {{ $categories->fragment('main-table')->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection