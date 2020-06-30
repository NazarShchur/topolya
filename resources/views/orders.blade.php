@extends("main")
@section('title', "Orders")
@section('content')
    <h2 class="text-center col-lg-12">Заказы</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Заказчик</th>
            <th scope="col">Номер</th>
            <th scope="col">Кол-во людей</th>
            <th scope="col">Беседка</th>
            <th scope="col">Дата</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->contact_name}}</td>
                <td>{{$order->contact_number}}</td>
                <td>{{$order->people_count}}</td>
                <td>{{$order->pavilion->name}}</td>
                <td>{{$order->date}}</td>
                <td>
                    @if($order->is_closed == 0)
                        <span style="color: red">Не оплачено</span>
                    @else
                        <span style="color: green">Олачено</span>
                    @endif
                </td>
                <td>
                    <a href="{{url("/orders/$order->id")}}">
                        Редактировать
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
