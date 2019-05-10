@extends("templates.master")

@section('css-view')

@stop

@section('conteudo-view')
    <div class="col-lg-6">
        <h1 class="my-4">Resultado:</h1>
    </div>

    @if($danger)
        <div class="col-lg-12 alert alert-danger">
    @else
        <div class="col-lg-12 alert alert-success">
    @endif
            <h1 class="my-4">{{$result}}</h1>
        </div>
@stop

@section('js-view')
@stop
