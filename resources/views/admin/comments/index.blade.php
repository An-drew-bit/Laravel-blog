@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Категории</h1>
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
                <h3 class="card-title">Список коментариев</h3>
            </div>
            <div class="card-body">
                @if (count($comments))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Наименование</th>
                                <th>Автор</th>
                                <th>Пост</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->title }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->post->title }}</td>
                                    <td>
                                        <form action="{{ route('admin.comments.destroy', ['comment' => $comment->id]) }}"
                                              method="post" class="float-left">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                <i
                                                    class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Коментариев пока нет...</p>
                @endif
            </div>

            <div class="card-footer clearfix">
                {{ $comments->links() }}
            </div>
        </div>

    </section>
@endsection
