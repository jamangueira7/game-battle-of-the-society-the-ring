@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
    <div class="col-lg-6">
        <h1 class="my-4">Inimigos:</h1>
    </div>

    <table class="table table-hover al_center" style="max-width: 99.99%;">
        <thead>
        <tr>
            <th width='100'>Imagem</th>
            <th width='50'>Nome</th>
            <th width='50'>Arma</th>
            <th width='100'>Imagem arma</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($villain as $v)
                <tr>
                    <td class="al_left"><img src="{{ asset('img\personages\\'.$v['image']) }}" width="100px" height="100px"> </td>
                    <td class="al_left">{{$v['name']}}</td>
                    <td class="al_left">{{$v['weapons']->name}}</td>
                    <td class="al_left"><img src="{{ asset('img\weapons\\'.$v['weapons']->image) }}" width="100px" height="100px"> </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row col-lg-6">
            <a href="{{route('game.backoff')}}" class="btn btn-danger btn-lg btn-block">Recuar!</a>
    </div>
    <div class="row col-lg-6">
        <a href="{{route('game.battle')}}" class="btn btn-info btn-lg btn-block">Ir para batalha!</a>
    </div>

@stop

@section('js-view')
@stop
