@extends('layout.main_layout')

@section('title', 'Login | Laravel Bookshelf')

@section('content')
    <div class="container d-flex justify-content-center align-items-center my-5">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Login</h3>

            <form action="{{ route('login_submit') }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Digite seu email"
                        
                         @if(old('email')) 
                                value="{{ old('email') }}"
                            @else 
                                value="admin@gmail.com"
                            @endif
                        >
                </div>

                @error('email')
                    <div class="alert alert-warning my-3">
                        {{$message}}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
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
                    {{-- Mostrar erros --}}
                    @error('password')
                        <div class="alert alert-warning my-3">
                            {{$message}}
                        </div>
                    @enderror
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="show">
                        <label class="form-check-label" for="show">Mostrar senha</label>
                    </div>
                </div>

                {{-- Invalid login  --}}
                @if(session('loginError'))
                    <div class="alert alert-warning my-3 text-center">
                        {{ session('loginError') }}
                    </div>
                @endif

                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-danger" value="Entrar">
                    <a href="{{ route('register_page') }}" class="btn btn-outline-secondary">Faça seu cadastro</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/show_password.js') }}"></script>
@endsection