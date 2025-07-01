@extends('layout.main_layout')
@section('title', "{$book['title']} | Laravel Bookshelf")

@section('content')
    <div class="container my-5">
        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-4"><i class="bi bi-arrow-left"></i> Voltar à Lista</a>
        <div class="card shadow-lg">
            <div class="row g-0">
                <div class="col-md-4 text-center p-4">
                    <img src="{{ asset('storage/' . $book['book_image']) }}" alt="Capa do livro"
                        class="img-fluid rounded shadow" style="max-height: 400px;" />

                    <div class="mt-5">

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title text-danger">
                            {{ $book['title'] }}
                        </h2>
                        <p class="text-muted mb-1"><i class="bi bi-person-lines-fill"></i> <strong>Autor(es):</strong>
                            {{ $book['authors'] }}</p>
                        <p class="text-muted mb-1"><i class="bi bi-journal"></i> <strong>Editora:</strong>
                            {{ $book['publisher'] }}</p>
                        <p class="text-muted mb-1"><i class="bi bi-file-earmark-text"></i> <strong>Nº de Páginas:</strong>
                            {{ $book['pages_qtd'] }}</p>
                        <p class="text-muted mb-1"><i class="bi bi-bookmark"></i> <strong>Gênero:</strong>
                            {{ $book['gender'] }}</p>
                        <p class="text-muted mb-1"><i class="bi bi-flag"></i> <strong>Nacional:</strong>
                            {{ $book['nacional'] === 'S' ? 'Sim' : 'Não' }}</p>

                        <hr>

                        <h5 class="text-dark"><i class="bi bi-card-text"></i> Descrição</h5>
                        <p class="card-text"> {{ $book['description'] }} </p>

                        @if ($book['user_id'] === session('user.id'))
                            <div class="mt-4 d-flex gap-2">
                                {{-- <a href="{{ }}" class="btn btn-outline-primary me-2"><i class="bi bi-pencil-square"></i> Editar</a> --}}
                                <form action="{{ route('books.destroy', ['id' => Crypt::encrypt($book['id'])]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE') <!-- Aqui está o truque -->

                                    <button type="submit" class="btn btn-outline-warning">
                                        <i class='bi bi-trash'></i> Excluir
                                    </button>

                                </form>
                                @include('book.modal.btn_modal')
                            </div>
                        @else
                            <div class="alert alert-light" style="font-size: .8rem">
                                Você pode editar ou excluir os livros que você publicou.
                            </div>
                        @endif

                        <!-- Área de avaliação -->
                        {{--
                        <hr>
                        <h4 class="mt-4">Deixe sua avaliação</h4>
                        <form method="POST" action="" class="mt-3">
                            {{-s- <input type="hidden" name="edit_token" value=""> s--}s}
                            <input type="hidden" name="id_usuario" value="">
                            <input type="hidden" name="id_livro" value="" />

                            <div class="mb-3">
                                <label for="comentario" class="form-label">Comentário</label>
                                <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="nota" class="form-label">Nota</label>
                                <select class="form-select" id="nota" name="nota" required>
                                    <option value="" selected disabled>Selecione uma nota</option>
                                    <option value="1">1 - Péssimo</option>
                                    <option value="2">2 - Ruim</option>
                                    <option value="3">3 - Regular</option>
                                    <option value="4">4 - Bom</option>
                                    <option value="5">5 - Excelente</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="bi bi-hand-thumbs-up"></i> Enviar Avaliação</button>
                        </form> --}}

                        <h3 class="my-4">Comentarios</h3>
                        {{--  --}}
                        <div class="accordion" id="accordionExample">
                            @foreach ($data_review as $review)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed mx-0" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseId{{ $review['id'] }}"
                                            aria-expanded="false" aria-controls="collapseId{{ $review['id'] }}">
                                            <span style="width: 60%;">{{ $review['username'] }} </span>
                                            <span class="">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < $review['note'])
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                    @else
                                                        <i class="bi bi-star text-warning"></i>
                                                    @endif
                                                @endfor
                                            </span>
                                        </button>
                                    </h2>
                                    <div id="collapseId{{ $review['id'] }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $review['comment'] }}
                                        </div>
                                    </div>
                                    
                                </div>
                            @endforeach

                            @if(count($data_review) > 0)
                                <div class="mt-3 d-flex justify-content-center">{{ $comments->links()}}</div>
                            @endif
                        </div>
                        {{--  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@if (session('success_message'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            alert("Livro atualizado com sucesso")
        });
    </script>
@endif
