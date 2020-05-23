@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('parts.errors')
                <div class="card-header text-center"><h4> Компания: {{$company->name}}</h4></div>

                {{--Комментарии о названии кампании--}}
                @include('parts.name')

                {{--Комментарии о компании в целом--}}
                @include('parts.about')

                {{--генеральный директор--}}
                @include('parts.manager')

                {{--Телефон--}}
                @include('parts.phone')

                {{--общая информация--}}
                @include('parts.general')

                {{--ИНН--}}
                @include('parts.tin')

                {{--Адресс--}}
                @include('parts.address')
            </div>
        </div>
@endsection
