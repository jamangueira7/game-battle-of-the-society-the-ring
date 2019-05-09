<!DOCTYPE html>
<html lang="en">
    @include('templates.head')
    <body>
        {{--HEADER DO SISTEMA--}}
        <header class="main-header">
            @include('templates.header')
        </header>
        <div class="container">

            {{--CONTEUDO DO SISTEMA--}}
            <div class="row">
                @yield('conteudo-view')
            </div>
        </div>
        {{--RODAPÉ DO SISTEMA--}}
        @include('templates.footer')
        @yield('js-view')
    </body>
</html>
