@extends("main")
@section('title', "Edit order")
@section('content')
    <h2>Услуги</h2>
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
                <td>
                    <label>
                        <input form="putform-{{$add->id}}" type="text" value="{{$add->name}}" name="name">
                    </label>
                </td>
                <td>
                    <label>
                        <input form="putform-{{$add->id}}" type="number" value="{{$add->price}}" name="price">
                    </label>
                </td>
                <td>
                    <label>
                        <select form="putform-{{$add->id}}" name="is_hourly">
                            <option @if($add->is_hourly == 1) selected @endif value="1">Почасовая</option>
                            <option @if($add->is_hourly == 0) selected @endif value="0">Фикс</option>
                        </select>
                    </label>
                </td>
                <td>
                    <form id="putform-{{$add->id}}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="additional_id" value="{{$add->id}}">
                        <button type="submit">Сохранить</button>
                    </form>
                </td>
                <td>
                    <form method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="additional_id" value="{{$add->id}}">
                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h2>
        Добавить услугу
    </h2>

    <form method="post">
        @csrf
        <label>
            Название
            <input type="text" name="name" required>
        </label>
        <label>
            Цена
            <input type="number" name="price" required>
        </label>
        <label>
            Тип
            <select name="is_hourly" >
                <option selected value="1">Почасовая</option>
                <option value="0">Фикс</option>
            </select>
        </label>
        <button type="submit">Сохранить</button>
    </form>
@endsection
