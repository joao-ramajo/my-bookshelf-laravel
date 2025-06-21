 <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
     <div class="container">
         <a class="navbar-brand fw-bold text-danger" href="{{ route('home_page') }}"><i class="bi bi-book"></i>Laravel Bookshelf</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
             @if(session('user'))
             <ul class="navbar-nav align-items-center">
                 <li class="nav-item me-3 text-secondary">
                     <div class="dropdown ">
                         <button class="btn btn-outline-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Bem-vindo, <strong class="">{{ session('user.username') }}</strong>
                         </button>
                         <ul class="dropdown-menu">
                             <li><a class="dropdown-item text-secondary" href="{$baseUrl}usuarios/editar-conta/$id/$token"><i class="bi bi-pencil-square"></i> Editar perfil</a></li>
                             <li><a class="dropdown-item text-danger" href="{{ route('users.destroy', ['id' => Crypt::encrypt(session('user.id'))]) }}" onclick="return confirm('Tem certeza que deseja excluir este esta conta ? <br>Aviso: Está ação não tem volta')"><i class="bi bi-trash"></i> Deletar conta</a></li>

                             <form action="{{ route('users.destroy', Crypt::encrypt(session('user.id'))) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar sua conta ?')">
                                @csrf
                                @method('DELETE') <!-- Aqui está o truque -->
                                <button type="submit" class="dropdown-item text-danger">Deletar</button>
                            </form>
                         </ul>
                     </div>

                 </li>
                 <li class="nav-item me-2">
                     <a class=" my-2 btn btn-outline-danger" href="{$baseUrl}livros?page=1"><i class="bi-plus-book"></i> Ver livros</a>
                 </li>
                 <li class="nav-item me-2">
                     <a class=" my-2 btn btn-outline-danger" href="{{ route('books.page') }}"><i class="bi-plus-circle"></i> Cadastrar Livro</a>
                 </li>
                 <li class="nav-item">
                     <a class=" my-2 btn btn-outline-danger" href="{{ route('logout') }}"><i class="bi-box-arrow-right"></i> Sair</a>
                 </li>

             </ul>
             @else
             <ul class="navbar-nav align-items-center">
                 <li class="nav-item me-3 text-secondary">
                     Para acessar as funcionalidades do site faça
                 </li>
                 <li class="nav-item">
                     <a class="btn btn-danger" href=" {{ route('login_page') }} ">Login</a>
                 </li>
             </ul>
             @endif
         </div>
     </div>
 </nav>