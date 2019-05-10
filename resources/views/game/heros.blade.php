@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
    <div class="col-lg-6">
        <h1 class="my-4">Escolha 1 para cada herói:</h1>
    </div>

    <div class="col-lg-12">
        <form method="post" action="{{route('game.battle')}}">
            @csrf
            <table class="table table-hover al_center" style="max-width: 99.99%;">
                <thead>
                <tr>
                    <th width='100'>Imagem</th>
                    <th width='100'>Nome</th>
                    <th width='50'>Tipo</th>
                    <th width='20' class="al_center">Escolher</th>
                </tr>
                </thead>
                <tbody>
                <?php $cont=0;?>
                @foreach ($personages as $personage)
                    <?php $cont++;?>
                    <tr>
                        <td class="al_left"><img src="{{ asset('img\personages\\'.$personage->image) }}" width="100px" height="100px"> </td>
                        <td class="al_left">{{$personage->name}}</td>
                        <td class="al_center">{{$personage->type}}</td>
                        <td class="al_center">
                            <input type="hidden" id="hero" name="hero-{{$cont}}" value="{{$personage->id}}">
                            <select class="form-control" id="armas-{{$cont}}" name="armas-{{$cont}}">
                                <option value="-1">***Escolha uma arma***</option>
                                @foreach ($weapons as $weapon)

                                    <option value="{{$weapon->id}}">{{$weapon->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="box-footer ">
                <button type="submit" id="continue" class="btn btn-primary navbar-right" style="float:right;" disabled>Ver adversarios</button>
            </div>
        </form>
        <br>
        <br>
    </div>
@stop

@section('js-view')
    <script>
        jQuery(document).ready(function(){
            armas = [];
            //SELECTBOX - 1
            $( "#armas-1" ).change(function(){
                varificacaoPadrao($("#armas-1").val());
            });
            //SELECTBOX - 2
            $( "#armas-2" ).change(function(){
                varificacaoPadrao($("#armas-2").val());
            });
            //SELECTBOX - 3
            $( "#armas-3" ).change(function(){
                varificacaoPadrao($("#armas-3").val());
            });
            //SELECTBOX - 4
            $( "#armas-4" ).change(function(){
                varificacaoPadrao($("#armas-4").val());
            });
            //SELECTBOX - 5
            $( "#armas-5" ).change(function(){
                varificacaoPadrao($("#armas-5").val());
            });

            function varificacaoPadrao(valor) {
                if(valor == "-1"){
                    zerarSelecao();
                    armas = [];
                    return;
                }
                if(varificarArray(armas, valor)){
                    msgErro();
                    if(mudancaArrayCheio(armas)){
                        for (i = 0; i < armas.length; i++) {
                            if(armas[i] == valor){
                                armas.splice(i,1);
                            }
                        }
                    }
                }else{
                    apagarErro();
                    armas.push(valor);
                    liberarBotao(armas);
                }
            }//varificacaoPadrao
        });

        function zerarSelecao() {
            $("#armas-1").val("-1");
            $("#armas-2").val("-1");
            $("#armas-3").val("-1");
            $("#armas-4").val("-1");
            $("#armas-5").val("-1");
        }//zerarSelecao

        function mudancaArrayCheio(valorArray) {
            if(valorArray.length == 5){
                return true;
            }
            return false;
        }//mudancaArrayCheio

        function liberarBotao(valorArray) {
            console.log(valorArray);
            if(mudancaArrayCheio(valorArray)){
                $("#continue").prop("disabled", false);
                apagarErro()
            }else{
                $("#continue").prop("disabled", true);
            }
        }//liberarBotao

        function apagarErro() {
            $( "#msgError" ).text("");
            $("#msgError").css("display", "none");
        }//apagarErro

        function msgErro() {
            $( "#msgError" ).show();
            $( "#msgError" ).text('Arma já foi escolhida para outro herói.');
            $("#continue").prop("disabled", true);
        }//msgErro
        function varificarArray(valorArray, valor) {
            for (i = 0; i < valorArray.length; i++) {
                if(valorArray[i] == valor){
                    return true
                }
            }
            return false;
        }//varificarArray
    </script>
@stop
