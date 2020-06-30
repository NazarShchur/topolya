<html lang="ru">
<head>
    <title>
        @yield('title', 'Topolya')
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <style>
        .content{
            min-height: 70%;
        }
    </style>
</head>
<body>
<div class="col-lg-12 p-4 text-center">
    <h1>Header</h1>
</div>
<div class="container content">
    @yield('content')
</div>
<div class="col-lg-12 p-4 text-center footer">
    <h1>Footer</h1>
</div>
</body>
</html>
