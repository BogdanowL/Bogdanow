@extends('layouts.app')

@section('content')
    <div class="container">
        @include('parts.errors')
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{ Form::open(['route' => 'company.store','method' => 'post']) }}
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label><h5>Название компании</h5></label>
                            <input name="name" value="{{old('name')}}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label><h5>ИНН компании</h5></label>
                            <input name="tin" value="{{old('tin')}}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label><h5>Общая информация</h5></label>
                            <input name="general" value="{{old('general')}}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label><h5>Генеральный директор</h5></label>
                            <input name="manager" value="{{old('manager')}}" type="text" class="form-control"
                                   id="exampleInputEmail1">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label><h5>Адрес компании</h5></label>
                            <input name="address" value="{{old('address')}}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label><h5>Телефон компании</h5></label>
                            <input name="phone" value="{{old('phone')}}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>
            <br>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
