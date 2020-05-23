@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h5>Список компаний:</h5></div>
                    <div class="card-body">
                        @if(!$companies)
                        @else
                            @foreach($companies as $company)
                                <div class="card-body">
                                    <a href="{{route('show', $company->id)}}" class="link-main">
                                        <div class="card-header text-center"><h4> Компания: {{$company->name}}</h4>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <input onclick="location.href='{{route('create')}}'" type="button"
                                   class="link-main btn btn-info btn-block" value="Добавить">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
