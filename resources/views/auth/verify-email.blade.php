@extends('auth.layouts.layout');

@section('content')

    <div class="login-box">
        <div class="card card-outline card-primary">

            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1"><b>Laravel</b>Blog</a>
            </div>

            <div class="card-body">
                <p class="login-box-msg">Подтверждение почты</p>
                <form action="{{ route('verification.send') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="container">
                            <p class="fw-normal">Необходимо подтверждение email</p>
                            <p class="fw-normal">Письмо отправлено в логи</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ml-2">
                            <button type="submit" class="btn btn-primary btn-block">Отправить повторно</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
