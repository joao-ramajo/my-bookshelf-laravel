<!-- Button trigger modal -->
<button type="button" class="dropdown-item text-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="bi bi-pencil-square"></i> Editar perfil
</button>

{{--   --}}



    <!-- Modal -->
<div class="modal fade" id="userUpdateModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalTitle">Editar perfil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('users.update') }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{ Crypt::encrypt(session('user.id')) }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Digite seu email"

                        value="{{ session('user.email') }}"

                        >
                                {{-- Email errors --}}
                @error('email')
                    <div class="alert alert-warning my-3">
                        {{$message}}
                    </div>
                @enderror


                </div>

        
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome de usuário</label>
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Digite seu nome"

                        
                        value="{{ session('user.username') }}"
                        >
                        
                {{-- Username errors --}}
                @error('username')
                    <div class="alert alert-warning my-3">
                        {{$message}}
                    </div>
                @enderror

                </div>

                <div class="row">
                    <div class="mb-3 col col-md-6 col-12">
                        <label for="senha" class="form-label">Senha</label>
                        <div class="input-group">
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Digite sua senha"
                    
                                >
                        </div>
                             {{-- Password errors --}}
                    @error('password')
                        <div class="alert alert-warning my-3">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3 col col-md-6 col-12">
                        <label for="confirma" class="form-label">Confirme sua senha</label>
                        <div class="input-group">
                            <input
                                type="password"
                                class="form-control"
                                id="password_confirm"
                                name="password_confirmation"
                                placeholder="Confirme sua senha"
                                >
                        </div>
                    
                            {{-- Password confirm errors --}}
                        @error('password_confirm')
                            <div class="alert alert-warning my-3">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="show">
                    <label class="form-check-label" for="show">Mostrar senha</label>
                </div>

                <div class="alert alert-light" style="font-size: 14px;">
                    Aviso: para realizar a atualização de informação, informe sua senha para confirmar sua identidade
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-danger" onclick="confirm('Após confirmar o envio, volte para esta tela para verificar se suas informações foram atualizadas ou se aconteceu algum erro.')">Atualizar informações</button>
                    {{-- <a href="{{ route('login_page') }}" class="btn btn-outline-secondary">Ir para login</a> --}}
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal">Fechar</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/show_password.js') }}"></script>