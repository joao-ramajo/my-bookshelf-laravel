
        <div class="container d-flex flex-row flex-wrap gap-5 justify-content-center">
            @foreach($books as $book)
                    <div class="card h-100 shadow-sm livro_card" style="width: 300px">
                        <img src="{{ asset('storage/' . $book['book_image']) }}" class="card-img-top" alt="Capa do livro {{ $book['title'] }}" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate" title="{$titulo}"> {{$book['title']}} </h5>
                            <h6 class="text-secondary">Genero: {{ $book['gender'] }} </h6>
                            <p class="card-text text-muted" style="height: 2.5em; overflow: hidden; text-overflow: ellipsis;">
                                {{ $book['description'] }}
                            </p>
                            <a href="{{ route('books.view', ['id' => Crypt::encrypt($book['id'])]) }}" class="btn btn-outline-primary mt-auto"><i class="bi-eye"></i> Visualizar</a>
                        </div>
                    </div>
            @endforeach

        </div>

        <div class="d-flex w-100 justify-content-center align-items-center my-3">{{ $books->links() }}</div>