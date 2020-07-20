@extends("main")
@section('title', "Calendar")
@section('content')
<div id="my-calendar"></div>
{{app('request')->input('date')}}
<script>
    const myCalendar = new TavoCalendar('#my-calendar', {
        locale: "ru",
        date: '2020-07',
        range_select: false,
        highlight: @json($halfOccupied),
        blacklist: @json($fullOccupied),
        highlight_sunday: false,
        highlight_saturday: false,
        multi_select: false,
        future_select: true,
        past_select: true
    })
</script>
@endsection
