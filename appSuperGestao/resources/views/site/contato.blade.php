@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivoContatos'=>$motivoContatos])
                <p>A nossa equipe analisará a sua mensagem e retornaremos o mais brevemente possível!</p>
                <p>O tempo médio para resposta é de 48 horas!</p>
                @endcomponent
            </div>
        </div>
    </div>
@endsection
