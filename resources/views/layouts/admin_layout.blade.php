<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin SHOP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">

</head>
<body>
    <header class="admin-header">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin') ? ' active' : null }}" href="/admin">Основная информация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('admin/products') ? ' active' : null }}" href="{{ route('products.index') }}" >Товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('admin/categories') ? ' active' : null }}" href="{{ route('categories.index') }}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('admin/materials') ? ' active' : null }}" href="{{ route('materials.index') }}">Материал</a>
                </li>
                <li class="nav-item to-site">
                    <a class="nav-link" href="/shop">На сайт</a>
                </li>
            </ul>
        </div>
    </header>
    <div class="container">

        @yield('content')

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/admin_main.js') }}"></script>
</body>
</html>