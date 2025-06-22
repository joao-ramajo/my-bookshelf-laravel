@extends('layout.main_layout')

@section('content')

    <section class="py-5 bg-white shadow-sm mb-4">
        <div class="container text-center">
            <h2 class="fw-bold text-danger"><i class="bi bi-book"></i> Laravel Bookshelf</h2>
            <p class="text-muted">O projeto My Bookshelf é uma implementação de um sistema de cadastro de livros que foi desenvolvido de ponta a ponta desde a prototipação da interface, validação do protótipo, desenvolvimento do front-end a implementação back-end.</p>
        </div>
    </section>

    <section class="mt-3 bg-white mb-4">
        {{-- Sucess messages --}}
        @include('layout.components.messages')

        @if($books && $books->count())
            @include('book.card')

        @else 
            <p class="alert alert-warning w-50 mx-auto text-center">Nenhum livro encontrado</p>
        @endif
        
    </section>

    @include('layout.components.modal')
@endsection