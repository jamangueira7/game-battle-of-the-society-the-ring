@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')

    <div class="col-lg-6">
        <h1 class="my-4">Escolha 5 herois:</h1>
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
        <form method="post" action="{{route('game.hero')}}">
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
                                <input type = "checkbox" id = "id-{{$personage->id}}" name = "troca[{{$personage->id}}]" data-chave="{{$personage->id}}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="box-footer ">
                <button type="submit" class="btn btn-primary navbar-right" style="float:right;">Escolher armas</button>
            </div>
        </form>
    <br>
    <br>
    </div>

   {{-- MODAL PERSONAGENS--}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width='50'>Imagem</th>
                        <th width='20'>Nome</th>
                        <th width='20'>Tipo</th>
                        <th width='10' class="al_center">Força</th>
                        <th width='10' class="al_center">Destreza</th>
                        <th width='10' class="al_center">Magia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ever as $personage)
                        @if($personage->hero)
                            <tr style="color: blue;">
                        @else
                            <tr style="color: red;">
                        @endif
                            <td class="al_left"><img src="{{ asset('img\personages\\'.$personage->image) }}" width="100px" height="100px"> </td>
                            <td class="al_left">{{$personage->name}}</td>
                            <td class="al_center">{{$personage->type}}</td>
                            <td class="al_center">{{$personage->force}}</td>
                            <td class="al_center">{{$personage->dexterity}}</td>
                            <td class="al_center">{{$personage->magic}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>

        </div>
    </div>


    {{-- MODAL ARMAS--}}
    <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width='50'>Imagem</th>
                        <th width='20'>Nome</th>
                        <th width='10' class="al_center">Força</th>
                        <th width='10' class="al_center">Destreza</th>
                        <th width='10' class="al_center">Magia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($weapons as $weapon)
                            <tr>
                                <td class="al_left"><img src="{{ asset('img\weapons\\'.$weapon->image) }}" width="100px" height="100px"> </td>
                                <td class="al_left">{{$weapon->name}}</td>
                                <td class="al_center">{{$weapon->force_min}}-{{$weapon->force_max}}</td>
                                <td class="al_center">{{$weapon->dexterity_min}}-{{$weapon->dexterity_max}}</td>
                                <td class="al_center">{{$weapon->magic_min}}-{{$weapon->magic_max}}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>

        </div>
    </div>
    {{-- MODAL REGRAS--}}
    <div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <h5>1 - Seleção de tropa</h5>
                    <p>1.1 - Pelo menos um Hobbit deve ser selecionado;</p>
                    <p>1.2 - Na tropa de orcs deve ter pelo menos 1 Uruk-Hai os demais serão aleatórios;</p>
                    <p>1.3 - Na tropa de orcs só pode haver um Sauron;</p>
                    <h5>2 - Entrega de armas</h5>
                    <p>2.1 - SOMENTE 5 armas serão escolhidas aleatóriamente e disponibilizadas para os personagens. A cada arma entregue uma arma a menos na lista disponível;</p>
                    <p>2.2 - Nenhum membro poderá utilizar uma arma onde ele não atenda a habilidade mínima dela (Limitação);</p>
                    <p>Exemplo: Frodo tem 1 ponto de força então ele não conseguirá usar um Machado porque a limitação é Força >= 5;</p>
                    <p>2.3 - Somente o Frodo poderá usar o Um Anel;</p>
                    <p>2.4 - Somente o Aragorn poderá chamar a Arwen;</p>
                    <p>2.5 - Orcs tem suas armas atribuídas automaticamente, nenhum deles irá para a batalha sem arma, se uma arma for atribuída a ele e não atender o item 2.1 outra arma deverá ser atribuída;</p>

                    <h5>3 - Contagem de pontos</h5>
                    <p>3.1 - Serão somadas todas as habilidades do personagem com a arma que ele estiver usando;</p>
                    <p>3.2 - As pontuações das armas serão aleatórias respeitando o mínimo e o máximo da tabela de pontuação;</p>
                    <p>3.3 - Armas que não atenderem o item 2.1 não terão seus pontos somados;</p>
                    <p>3.4 - Os pontos do Olho De Sauron só serão somados a tropa de orcs se na tropa da sociedade tiver o Frodo usando o Um Anel como arma;</p>

                    <h5>4 - Desenvolvimento</h5>
                    <p>4.1 - O uso de bibliotecas, frameworks e banco de dados são livres, use o que tiver que usar para fazer o jogo;</p>
                    <p>4.2 - O objetivo do teste não é a entrega em si, não é avaliar o certo o erro e sim analisar o nível do candidato. Preocupe-se em utilizar a Orientação Objeto adequadamente, se julgar necessário use o Designer Patterns que quiser;</p>
                    <p>4.3 - Faça upload do seu código no Github ou outro site semelhante e envie o link para sergio.hess@psychemedics.com.br. Se tiver algo não convencional para fazer seu código rodar informe no e-mail;</p>
                    <p>4.4 - Faça bloqueios de refresh na página durante o jogo para impedir falcatruas;</p>
                    <p>4.5 - Qualquer dúvida sempre pergunte;</p>
                    <p>4.6 - Faça um frontend simples de se usar;</p>
                    <p>4.7 - Divirta-se codando, trabalho sem amor não vira;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>

        </div>
    </div>
@stop

@section('js-view')

@stop
