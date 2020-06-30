@extends("main")
@section('title', 'Pavilions')
@section('content')
<div class="row">
    @foreach($pavilions as $pavilion)
        <div class="col-lg-12 m-5">
            {{$pavilion->name}}
            <li>
                Цена - {{$pavilion->price}}
            </li>
            <li>
                Макимум мест - {{$pavilion->places_count}}
            </li>
            <a href="{{url("pavilions/$pavilion->id")}}" > Заказать </a>
        </div>
    @endforeach
</div>
@endsection
