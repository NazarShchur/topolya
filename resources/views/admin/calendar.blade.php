@extends("main")
@section('title', "Calendar")
@section('content')

    Полностью заняты
    @foreach($fullOccupied as $date)
        {{$date}}
    @endforeach
    Частично заняты
    @foreach($halfOccupied as $date)
        {{$date}}
    @endforeach

<div id="my-calendar"></div>

<script>
    const myCalendar = new TavoCalendar('#my-calendar', {
        locale: "ru",
        date: "2020-7-21",
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
