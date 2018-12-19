<ul class="list-group">
    @foreach($categories as $category)
    <a href="{{ route('shop', ['category'=>$category->cat_code]) }}" class="category-link">
        <li class="list-group-item {!! (Request::segment(2)==$category->cat_code) ? ' active' : null !!}">
            {{ $category->cat_name }}
        </li>
    </a>
    @endforeach
</ul>