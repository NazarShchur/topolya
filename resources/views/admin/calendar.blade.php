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

@endsection
