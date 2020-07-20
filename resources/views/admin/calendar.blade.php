@extends("main")
@section('title', "Calendar")
@section('content')

{{--    @foreach($calendar['2020-07-16'] as $order)--}}
{{--        {{$order}}--}}
{{--        {{$order->pavilion()->first()}}--}}
{{--    @endforeach--}}

<div id="my-calendar"></div>
<script>
    const myCalendar = new TavoCalendar('#my-calendar', {
        locale: "ru",
        date: "2020-12-21",
        range_select: false,
        highlight: ["2020-12-23"],
        blacklist: ["2020-12-24","2020-12-25"],
        highlight_sunday: false,
        highlight_saturday: false,
        multi_select: false,
        future_select: true,
        past_select: true
    })

</script>
@endsection
