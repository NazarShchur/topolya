@extends("main")
@section('title', "Edit order")
@section('content')
    <h2 class="text-center col-lg-12">Заказ №{{$order->id}} за {{$order->date}}</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Услуга</th>
            <th scope="col">Цена</th>
            <th scope="col">Время начала</th>
            <th scope="col">Время конца</th>
            <th scope="col">К оплате</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->additional_orders as $add)
            <tr>
                <td>{{$add->additional->name}}</td>
                <td>{{$add->additional->price}}@if($add->additional->is_hourly == 1)/час@endif</td>
                <td>
                    @if(!is_null($add->start_time)){{$add->start_time->format('H:i')}}@endif
                </td>
                <td>
                    @if($add->additional->is_hourly == 1)
                        @if(is_null($add->end_time))
                            <form method="post" action="{{url('admin/closeHourly')}}">
                                @csrf
                                <input type="time" name='end_time' value="{{$now}}" required>
                                <input type="hidden" name="additional_order_id" value="{{$add->id}}">
                                <button type="submit">Закрыть</button>
                            </form>
                        @else
                            {{$add->end_time->format('H:i')}}
                        @endif
                    @endif
                </td>
                <td>
                    {{$add->to_pay}}
                </td>
                <td>
                    @if($add->is_closed == 0)
                        <span style="color: red">Не оплачено</span>
                    @else
                        <span style="color: green">Оплачено</span>
                    @endif
                </td>
                @if($add->is_closed == 0)
                    <td>
                        @if($add->to_pay > 0)
                            <form method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" value="{{$add->id}}">
                                <button type="submit">Оплатить</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <form method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{$add->id}}">
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                @elseif(!$order->is_closed)
                    <td>
                        <form method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="id" value="{{$add->id}}">
                            <button type="submit">Отменить оплату</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Всего к оплате : {{$to_pay}}</td>
            <td>Всего оплачено : {{$payed}}
            @if(!$order->is_closed)
                <td>Осталось: {{$to_pay-$payed}}</td>
                <td>
                    <form method="post">
                        @csrf
                        <button type="submit">Закрыть заказ</button>
                    </form>
                </td>
            @endif
        </tr>
        </tbody>
    </table>
    @if(!$order->is_closed)
        <h2>Доп услуги</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Услуга</th>
                <th scope="col">Цена</th>
                <th scope="col">Тип</th>
            </tr>
            </thead>
            <tbody>
            @foreach($additionals as $add)
                <tr>
                    <td>{{$add->name}}</td>
                    <td>{{$add->price}}</td>
                    <td>
                        @if($add->is_hourly == 1)
                            Почасовая
                        @else
                            Фикс
                        @endif
                    </td>
                    <td>
                        <form method="post" action="{{url('admin/addAdditional')}}">
                            @csrf
                            @if($add->is_hourly == 1)
                                <input type="time" name='start_time' value="{{$now}}" required>
                            @endif
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                            <input type="hidden" name="additional_id" value="{{$add->id}}">
                            <button type="submit">Добавить к заказу</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif


@endsection
