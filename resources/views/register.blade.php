@extends('layout.main_layout')

@section('title', 'Cadastro | Laravel Bookshelf')

@section('content')

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
            <h3 class="text-center mb-4">Cadastro</h3>



            <form action="{{ route('register_submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Digite seu email"
                        
                        @if(old('email'))
                            value="{{ old('email') }}"
                        @else 
                            value="johndoe@gmail.com"
                        @endif

                        >
                                {{-- Email errors --}}
                @error('email')
                     <x-alert-danger>{{ $message }}</x-alert-danger>
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

                        
                        @if(old('username'))
                            value="{{ old('username') }}"
                        @else 
                            value="John Doe"
                        @endif
                        >
                        
                {{-- Username errors --}}
                @error('username')
                 <x-alert-danger>{{ $message }}</x-alert-danger>
                @enderror

                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <div class="input-group">
                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            placeholder="Digite sua senha"

                            
                        @if(old('password'))
                            value="{{ old('password') }}"
                        @else 
                            value="123456"
                        @endif
                            >
                    </div>
                         {{-- Password errors --}}
                @error('password')
                 <x-alert-danger>{{ $message }}</x-alert-danger>
                @enderror
                </div>
           
               
                <div class="mb-3">
                    <label for="confirma" class="form-label">Confirme sua senha</label>
                    <div class="input-group">
                        <input
                            type="password"
                            class="form-control"
                            id="password_confirm"
                            name="password_confirmation"
                            placeholder="Confirme sua senha"
                            
                        @if(old('password_confirmation'))
                            value="{{ old('password_confirmation') }}"
                        @else 
                            value="123456"
                        @endif
                            >
                    </div>
                    
                        {{-- Password confirm errors --}}
                    @error('password_confirm')
                     <x-alert-danger>{{ $message }}</x-alert-danger>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="show">
                    <label class="form-check-label" for="show">Mostrar senha</label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-danger">Cadastrar</button>
                    <a href="{{ route('login_page') }}" class="btn btn-outline-secondary">Ir para login</a>
                </div>
            </form>
        </div>
    </div>


    <script src="{{ asset('js/show_password.js') }}"></script>
@endsection