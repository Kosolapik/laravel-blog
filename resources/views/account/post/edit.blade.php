@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста "{{ $post->title }}"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                            <li class="breadcrumb-item active">Редактирование поста</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Заголовок поста</label>
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input class="form-control" type="text" name="title"
                                    placeholder="Введите заголовок нового поста ..." value="{{ $post->title }}">
                            </div>
                            <div class="form-group">
                                <label>Содержание поста</label>
                                @error('content')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Выберите категорию</label>
                                @error('category_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <select class="form-control" name="category_id">
                                    <option></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $post->category_id ? ' selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Выберите тэги</label>
                                @error('tad_ids')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <select class="select2" name="tag_ids[]" multiple="multiple"
                                    data-placeholder="Выберите тэги" style="width: 100%;">
                                    @foreach ($tags as $tag)
                                        <option
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Изменить изображение</label>
                                @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="m-2">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="image"
                                        style="max-height: 150px">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Выбирите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Изменить превью</label>
                                @error('preview')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="m-2">
                                    <img src="{{ asset('storage/' . $post->preview) }}" alt="image"
                                        style="max-height: 150px">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview">
                                        <label class="custom-file-label">Выбирите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
