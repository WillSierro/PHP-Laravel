@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
        <p>Adicionar Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{-- {{ $msg ?? '' }} --}}
                <form method="post" action="">
                    @csrf
                    <input type="text" name="nome" value="" placeholder="Nome" class="borda-preta">
                
                    <input type="text" name="descricao" placeholder="Descrição" class="borda-preta" value="">

                    <input type="text" name="peso" placeholder="Peso" class="borda-preta" value="" >

                    <select name="unidade_id">
                        <option>---Selecione a Unidade de Medida---</option>
                        <option value='1'>Unidade</option>
                    </select>

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        
        </div>
    </div>
@endsection
