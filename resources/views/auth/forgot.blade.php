@extends('auth.layouts.layout');

@section('content')

    <div class="login-box">
        <div class="card card-outline card-primary">

            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1"><b>Laravel</b>Blog</a>
            </div>

            <div class="card-body">
                <p class="login-box-msg">Восстановление пароля</p>
                <form action="{{ route('forgot') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ml-2">
                            <button type="submit" class="btn btn-primary btn-block">Восстановить</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="{{ route('login.create') }}">Вспомнил, отменить</a>
                </p>
            </div>

        </div>
    </div>

@endsection