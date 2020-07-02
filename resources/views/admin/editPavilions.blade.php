@extends("main")
@section('title', "Edit pavilions")
@section('content')
    <h2 class="text-center">Беседки</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Беседка</th>
            <th scope="col">Цена</th>
            <th scope="col">Максимум мест</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pavilions as $p)

            <tr>
                <td>
                    <label>
                    <input form="putform-{{$p->id}}" type="text" name="name" value="{{$p->name}}">
                    </label>
                </td>
                <td>
                    <label>
                    <input form="putform-{{$p->id}}" type="number" name="price" value="{{$p->price}}">
                    </label>
                </td>
                <td>
                    <label>
                        <input form="putform-{{$p->id}}" type="number" name="places_count" value="{{$p->places_count}}">
                    </label>
                </td>
                <td>
                    <form id="putform-{{$p->id}}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="pavilion_id" value="{{$p->id}}">
                        <button type="submit">Сохранить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h2>Добавить беседку</h2>
    <form method="post">
        @csrf
        <label>
            Название @if($errors->any())<span style="color: red">{{$errors->first()}}</span>@endif
            <input type="text" name="name" required>
        </label>
        <label>
            Цена
            <input type="number" name="price" required>
        </label>
        <label>
            Максимум мест
            <input type="number" name="places_count" required>
        </label>
        <button type="submit">Сохранить</button>
    </form>

@endsection

