<div class="card">
    <div class="card-body">
        <div class="accordion" id="accordionExample">
            <div class="card ">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-block collapsed btn-main" type="button" data-toggle="collapse"
                                data-target="#collapseTwo7" aria-expanded="false" aria-controls="collapseTwo">
                            <h5 class="btn-main">Комментарии</h5>
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        @if(!$nameComments)
                        @else
                            @foreach($nameComments as $comment)
                                {{ Form::open(['route' => ['delete',
                                    $comment->id], 'method' => 'delete']) }}
                                <div class="pull-right">
                                    <button onclick="return confirm('Удалить комментарий?')" type="submit"
                                            class="delete-task">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                </div>
                                {{ Form::close() }}
                                <h5> {{$comment->text}} </h5>
                                <div>{{$comment->created_at->diffForHumans()}}</div>
                                <hr>
                            @endforeach
                        @endif
                        {{ Form::open(['route' => ['store',
                        $company->id], 'method' => 'post']) }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Отзывы о названии</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1">
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<br>
