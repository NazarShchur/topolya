@extends("main")
@section('title', "Calendar")
@section('content')
<div id="my-calendar"></div>
<script>
    const myCalendar = new TavoCalendar('#my-calendar', {
        locale: "ru",
        date: @json($date),
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
