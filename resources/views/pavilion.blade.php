@extends("main")
@section('title', $pavilion->name)
@section('content')
    <h2 class="text-center">{{$pavilion->name}}</h2>
    <div class="row">
        <div class="col-lg-6">
            <img width="100%" src="https://images.ua.prom.st/996285289_w640_h640_zasteklennaya-besedka-s.jpg">
        </div>
        <div class="col-lg-6">
            <p>Цена - {{$pavilion->price}}</p>
            <p>Максимум мест - {{$pavilion->places_count}}</p>
            @if(!is_null($pavilion->orders))
                <p>Занятые даты </p>
                @foreach($pavilion->orders as $order)
                    <p>{{$order->date}}</p>
                @endforeach
            @endif
            <form method="post" action="{{url("/createOrder")}}">
                @csrf
                <label class="col-lg-12">Ваше имя <input type="text" name="name" placeholder="Ваше имя"></label>
                <label class="col-lg-12">Дата <input type="date" name="date"></label>
                <label class="col-lg-12">Номер телефона <input type="number" name="phone" placeholder="Номер телефона"></label>
                <label class="col-lg-12">Количество людей <input type="number" name="people_count"  placeholder="Количество людей"></label>
                <input type="hidden" name="pavilion_id" value="{{$pavilion->id}}">
                <button type="submit">Заказать</button>
            </form>
        </div>

    </div>

@endsection
