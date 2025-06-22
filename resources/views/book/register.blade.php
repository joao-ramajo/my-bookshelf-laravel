@extends('layout.main_layout');

@section('content')
    <div class="w-50 mx-auto my-5">
        {{-- Exceptions --}}
        @if(session('exception_error'))
            <div class="alert alert-warning">
                {{ session('exception_error') }}
            </div>
        @endif
        <form action="{{ route('books.new') }}" method="POST" enctype="multipart/form-data" class="p-4 bg-white rounded shadow-sm">
            @csrf

            <input type="hidden" name="user_id" value="{{ session('user.id') }}">

            <h4 class="mb-4 text-danger"><i class="bi bi-book"></i> Cadastrar Novo Livro</h4>

            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="Percy Jackson e o Ladrão de Raios" placeholder="Digite o título do livro" >

                {{-- Error message --}}
                @error('title')
                    <div class="alert alert-warning my-3">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="autores" class="form-label">Autor(es)</label>
                <input type="text" class="form-control" id="authors" name="authors" value="Elisabeth Swan" placeholder="Digite o nome do(s) autor(es)">
                {{-- Error message --}}
                @error('authors')
                    <div class="alert alert-warning my-3">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <p class="text-secondary">Caso o livro tenha mais de um autor, separe por ';'</p>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="pages_qtd" class="form-label">Número de páginas</label>
                    <input type="number" class="form-control" id="pages_qtd" name="pages_qtd" value="200" placeholder="Quantidade de páginas" >
                    {{-- Error message --}}
                    @error('pages_qtd')
                        <div class="alert alert-warning my-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gênero</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="Terror" placeholder="Ex: Fantasia, Romance..." >
                    {{-- Error message --}}
                    @error('gender')
                        <div class="alert alert-warning my-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nacional" class="form-label">O livro é nacional?</label>
                    <select class="form-select" id="nacional" name="nacional">
                        <option value="D" disabled selected>Selecione uma opção</option>
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </select>
                    {{-- Error message --}}
                    @error('nacional')
                        <div class="alert alert-warning my-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="publisher" class="form-label">Editora</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" value="Burguers Book" placeholder="Nome da editora">
                    {{-- Error message --}}
                    @error('publisher')
                        <div class="alert alert-warning my-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="book_image" class="form-label">Capa do livro</label>
                <input type="file" class="form-control" name="book_image" id="book_image">{{-- Error message --}}
                @error('book_image')
                    <div class="alert alert-warning my-3">
                        {{ $message }}
                    </div>
                @enderror
                
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" rows="4" name="description" placeholder="Fale um pouco sobre o livro">Descrição genérica do livro</textarea>
                @error('description')
                    <div class="alert alert-warning my-3">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-book"></i> Cadastrar Livro</button>
        </form>
    </div>


@endsection