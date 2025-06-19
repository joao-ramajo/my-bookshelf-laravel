@extends('layout.main_layout')

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
                        
                        value="john">
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
                            
                            value="123">
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

                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-danger" value="Entrar">
                    <a href="cadastro" class="btn btn-outline-secondary">Faça seu cadastro</a>
                </div>
            </form>
        </div>
    </div>


@endsection