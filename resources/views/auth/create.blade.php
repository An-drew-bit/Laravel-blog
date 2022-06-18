@extends('auth.layouts.layout')

@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">

            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1"><b>Laravel</b>Blog</a>
            </div>

            <div class="card-header text-center">
                <b>Регистрация</b>
            </div>

            <div class="card-body">
                <form action="{{ route('register.store') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email"
                               value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Повторите пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 offset-8">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>

                </form>
                <a href="{{ route('login.create') }}" class="text-center">Есть аккаунт? Нажмите сюда</a>
            </div>

        </div>
    </div>
@endsection
