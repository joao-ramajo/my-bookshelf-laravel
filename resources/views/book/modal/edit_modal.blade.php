<!-- Modal -->
<div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="Edit book modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle"><i class="bi bi-book"></i> Editar | {{ $book['title'] }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- modal content --}}
                <form action="{{ route('books.update', Crypt::encrypt($book['id'])) }}" method="POST"
                    enctype="multipart/form-data" class="">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="user_id" value="{{ Crypt::encrypt(session('user.id')) }}">

                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $book['title'] }}"
                            >

                        {{-- Error message --}}
                        @error('title')
                            <x-alert-danger>{{ $message }}</x-alert-danger>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="autores" class="form-label">Autor(es)</label>
                        <input type="text" class="form-control" id="authors" name="authors"
                            value="{{ $book['authors'] }}" placeholder="Digite o nome do(s) autor(es)">
                        {{-- Error message --}}
                        @error('authors')
                            <x-alert-danger>{{ $message }}</x-alert-danger>
                        @enderror
                    </div>
                    <p class="text-secondary">Caso o livro tenha mais de um autor, separe por ';'</p>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pages_qtd" class="form-label">Número de páginas</label>
                            <input type="number" class="form-control" id="pages_qtd" name="pages_qtd"
                                value="{{ $book['pages_qtd'] }}" placeholder="Quantidade de páginas">
                            {{-- Error message --}}
                            @error('pages_qtd')
                                <x-alert-danger>{{ $message }}</x-alert-danger>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gênero</label>
                            <input type="text" class="form-control" id="gender" name="gender"
                                value="{{ $book['gender'] }}" placeholder="Ex: Fantasia, Romance...">
                            {{-- Error message --}}
                            @error('gender')
                                <x-alert-danger>{{ $message }}</x-alert-danger>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nacional" class="form-label">O livro é nacional?</label>
                            <select class="form-select" id="nacional" name="nacional">
                                <option value="D" disabled>Selecione uma opção</option>
                                <option value="S" {{ $book['nacional'] == 'S' ? 'selected' : '' }}>Sim</option>
                                <option value="N" {{ $book['nacional'] == 'S' ? '' : 'selected' }}>Não</option>
                            </select>
                            {{-- Error message --}}
                            @error('nacional')
                                <x-alert-danger>{{ $message }}</x-alert-danger>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="publisher" class="form-label">Editora</label>
                            <input type="text" class="form-control" id="publisher" name="publisher"
                                value="{{ $book['publisher'] }}" placeholder="Nome da editora">
                            {{-- Error message --}}
                            @error('publisher')
                                <x-alert-danger>{{ $message }}</x-alert-danger>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="book_image" class="form-label">Capa do livro</label>
                        <input type="file" class="form-control" name="book_image" id="book_image" value="1234567">
                        {{-- Error message --}}
                        <label for="book_image" class="form-label">Capa atual <br>
                            <img src="{{ asset('storage/' . $book['book_image']) }}" alt="Capa do livro"
                                class="img-fluid rounded" style="max-height: 400px;" />
                        </label>

                        @error('book_image')
                            <x-alert-danger>{{ $message }}</x-alert-danger>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" rows="4" name="description"
                            placeholder="Fale um pouco sobre o livro">{{ $book['description'] }}</textarea>

                        @error('description')
                            <x-alert-danger>{{ $message }}</x-alert-danger>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-book"></i> Atualizar
                            Informações</button>
                    </div>
                </form>

                {{--  --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary w-100"
                    data-bs-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let myModal = new bootstrap.Modal(document.getElementById('editBookModal'));
            myModal.show();
        });
    </script>
@endif
<script src="{{ asset('js/show_password.js') }}"></script>
