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
                <h3 class="card-title">Список категорий</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3">Добавить категорию</a>

                @if (count($categories))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Наименование</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', ['category' => $category]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        @can('delete', $category)
                                            <form>
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Категорий пока нет...</p>
                @endif
            </div>

            <div class="card-footer clearfix">
                {{ $categories->links() }}
            </div>
        </div>

    </section>

    <script>
        $(document).ready(function () {
            $("#delete").on("click", function(e) {

                if(!confirm("Подтвердите удаление")) {
                    return false;
                }

                e.preventDefault();

                $.ajax({
                    url: "{{ route('admin.category.destroy', ['category' => $category]) }}",
                    type: 'DELETE',
                    data: { _token: "{{ csrf_token() }}" },
                    success: function () {
                        $("tr").remove();
                    }
                });

                return false;
            });
        });
    </script>
@endsection
