<html lang="ru">
<head>
    <title>
        @yield('title', 'Topolya')
    </title>
    <link rel="stylesheet" href="/css/app.css"/>
    <style>
        .content{
            min-height: 70%;
        }
    </style>
</head>
<body>
<div class="col-lg-12 p-4 text-center">
    Меню: <a href="admin/editPavilions">Беседки</a>, <a href="admin/editAdds">Допы</a>
</div>
<div class="container content">
    @yield('content')
</div>
<div class="col-lg-12 p-4 text-center footer">
    <h1>Footer</h1>
</div>
</body>
</html>
