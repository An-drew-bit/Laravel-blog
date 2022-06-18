@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новая статья</h1>
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

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Создать</h3>
            </div>
            <form role="form" method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="author">Автор</label>
                        <input type="text" class="form-control mb-2 @error('author') is-invalid @enderror" id="title"
                               placeholder="Автор" name="author">

                        <label for="title">Название</label>
                        <input type="text" class="form-control mb-2 @error('title') is-invalid @enderror" id="title"
                               placeholder="Название" name="title">

                        <label for="desc">Цитата</label>
                        <textarea class="form-control mb-2 @error('desc') is-invalid @enderror" rows="2" id="desc"
                                  placeholder="Цитата" name="desc"></textarea>

                        <label for="content">Контент</label>
                        <textarea class="form-control mb-2 @error('content') is-invalid @enderror" rows="5" id="content"
                                  placeholder="Контент" name="content"></textarea>

                        <label for="category_id">Категория</label>
                        <select class="form-control mb-2 w-50" id="category_id" name="category_id">
                            @foreach($categories as $key => $values)
                                <option value="{{ $key }}">{{ $values }}</option>
                            @endforeach
                        </select>

                        <label for="tags">Теги</label>
                        <select class="select2 mb-2 w-50" multiple="multiple" id="tags" name="tags[]">
                            @foreach($tags as $key => $values)
                                <option value="{{ $key }}">{{ $values }}</option>
                            @endforeach
                        </select>

                        <div class="form-group input-group mt-4 d-block">
                            <label for="thumbnail">Изображение</label>
                            <div class="input-group w-50">
                                <div class="custom-file">
                                    <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>

    </section>
@endsection
