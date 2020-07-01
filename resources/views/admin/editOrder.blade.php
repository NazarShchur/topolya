@extends("main")
@section('title', "Edit order")
@section('content')
    <h2 class="text-center col-lg-12">Заказ №{{$order->id}}</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Услуга</th>
            <th scope="col">Цена</th>
            <th scope="col">Время начала</th>
            <th scope="col">Время конца</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->additional_orders as $add)
            <tr>
                <td>{{$add->additional->name}}</td>
                <td>{{$add->additional->price}}@if($add->additional->is_hourly == 1)/час@endif</td>
                <td>{{$add->start_time}}</td>
                <td>
                    @if($add->additional->is_hourly == 1)
                        @if(is_null($add->end_time))
                            <form method="post" action="{{url('admin/closeHourly')}}">
                                @csrf
                                <input type="datetime-local" name='end_time' required>
                                <input type="hidden" name="additional_order_id" value="{{$add->id}}">
                                <button type="submit">Закрыть</button>
                            </form>
                        @else
                            {{$add->end_time}}
                        @endif
                    @endif
                </td>
                <td>
                    @if($add->is_closed == 0)
                        <span style="color: red">Не оплачено</span>
                    @else
                        <span style="color: green">Олачено</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
                            <input type="datetime-local" name='start_time' required>
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


@endsection
