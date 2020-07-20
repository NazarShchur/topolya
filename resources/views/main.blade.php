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

    {{--TavoCalendar start, сделать вывод не на всех страницах--}}
    {{--moment.js для календаря--}}
    <script src="https://cdn.jsdelivr.net/npm/moment@latest/min/moment-with-locales.min.js"></script>
    <link rel="stylesheet" href="http://cretail.ru/tavo-calendar.css" />
    <script src="http://cretail.ru/tavo-calendar.js"></script>
    {{--TavoCalendar end--}}


    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">


</head>
<body>
<div class="col-lg-12 p-4 text-center">
    <a href="/admin/calendar">Календарь</a> || <a href="/pavilions">Заказать беседку</a>
    <br/>
    <a href="/admin/editPavilions">Изм. беседки</a>, <a href="/admin/editAdds">Изм. допы</a>
</div>
<div class="container content">
    @yield('content')
</div>
<div class="col-lg-12 p-4 text-center footer">
    <h1>Footer</h1>
</div>
</body>
</html>
