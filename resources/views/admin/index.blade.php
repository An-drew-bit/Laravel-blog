@extends('admin.layouts.layout')

@section('content')
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Панель администратора</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div>

        </section>

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Информация</h1>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Выводы сообщений</h1>
                    </div>

                    <div class="alert alert-danger">
                        <h6 class="fw-light">Ошибка</h6>
                    </div>
                    <div class="alert alert-success">
                        <h6 class="fw-light">Это сообщение было добавлено динамически</h6>
                    </div>
                    <div class="alert alert-warning">
                        <h6 class="fw-light">Ворнинг</h6>
                    </div>

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Роли и права пользователей</h1>
                    </div>

                    <div class="d-flex flex-column">
                        <h5 class="fw-light">1 - Администратор</h5>
                        <h5 class="fw-light">2 - Менеджер</h5>
                        <h5 class="fw-light">0 - Пользователь</h5>
                    </div>
                </div>

                <div class="card-footer">
                    Footer
                </div>
            </div>

        </section>
@endsection
