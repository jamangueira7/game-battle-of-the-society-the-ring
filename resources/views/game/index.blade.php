@extends("templates.master")

@section('css-view')

@stop

@section('conteudo-view')

    <div class="col-lg-6">
        <h1 class="my-4">Escolha 5 heróis:</h1>
    </div>

    <div class="col-lg-6">
        <br>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
            Personagens
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg2">
            Armas
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg3">
            Regras do jogo
        </button>
    </div>
    <div class="col-lg-12">
        <form method="POST" action="{{route('game.hero')}}">
            @csrf
            <table class="table table-hover al_center" style="max-width: 99.99%;">
                <thead>
                <tr>
                    <th width='100'>Imagem</th>
                    <th width='100'>Nome</th>
                    <th width='50'>Tipo</th>
                    <th width='20' class="al_center">Força</th>
                    <th width='20' class="al_center">Destreza</th>
                    <th width='20' class="al_center">Magia</th>
                    <th width='20' class="al_center">Escolher</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($personages as $personage)
                        <tr>
                            <td class="al_left"><img src="{{ asset('img\personages\\'.$personage->image) }}" width="100px" height="100px"> </td>
                            <td class="al_left">{{$personage->name}}</td>
                            <td class="al_center">{{$personage->type}}</td>
                            <td class="al_center">{{$personage->force}}</td>
                            <td class="al_center">{{$personage->dexterity}}</td>
                            <td class="al_center">{{$personage->magic}}</td>
                            <td class="al_center">
                                <input type="checkbox" id="id-{{$personage->id}}" name="tropa[{{$personage->id}}]" value="{{$personage->id}}" data-chave="{{$personage->id}}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="box-footer ">
                <button type="submit" id="continue" class="btn btn-primary navbar-right" style="float:right;" disabled>Escolher armas</button>
            </div>
        </form>
    <br>
    <br>
    </div>
    @include('templates.modal')
@stop

@section('js-view')
    <script>


        jQuery(document).ready(function(){
            $( "input[type=checkbox]" ).click(function(){
                if($(":checkbox:checked").length == 5){
                    camposMarcados = new Array();

                    $( "#msgSuccess" ).text("");
                    $( "#msgError" ).text("");
                    $("#msgSuccess").css("display", "none");
                    $("#msgError").css("display", "none");

                    $("input[type=checkbox]:checked").each(function(){
                        camposMarcados.push($(this).val());
                    });

                    $exite=false;
                    for (i = 0; i < camposMarcados.length; i++) {
                        if(camposMarcados[i] == '1' || camposMarcados[i] == '2' || camposMarcados[i] == '3' || camposMarcados[i] == '4'){
                            $exite=true;
                        }
                    }
                    if($exite)
                    {
                        $("#continue").prop("disabled", false);
                    }else{
                        $("#continue").prop("disabled", true);
                        $( "#msgError" ).show();
                        $( "#msgError" ).text('Para prosseguir é preciso adicionar ao menos um Hobbit.');
                    }
                }

                if($(":checkbox:checked").length > 5){
                    $("#continue").prop("disabled", true);
                    $( "#msgError" ).show();
                    $( "#msgError" ).text('Selecione apenas 5 guerreiros.');
                }

            });
        });

    </script>
@stop
