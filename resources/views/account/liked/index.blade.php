@extends('account.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Понравивщиеся посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('account.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Понравивщиеся посты</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список постов</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Пойск">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Превью</th>
                                            <th>Название</th>
                                            <th>Содержание</th>
                                            <th>Категория</th>
                                            <th>Тэги</th>
                                            <th>Дата лайка</th>
                                            <th colspan="1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>
                                                    <img class="img-fluid rounded img-thumbnail" style="max-height: 50px"
                                                        src="{{ asset('storage/' . $post->preview) }}" alt="image">
                                                </td>
                                                <td>{{ $post->title }}</td>
                                                <td>{!! $post->content !!}</td>
                                                <td>{{ $post->category->title }}</td>
                                                <td>
                                                    @foreach ($post->tags as $tag)
                                                        <span
                                                            class="badge badge-success m-1">{{ '#' . $tag->title }}</span><br>
                                                    @endforeach
                                                </td>
                                                <td>{{ $carbon::parse($post->created_at)->format('d.m.Y') }}</td>
                                                <td>
                                                    <form action="{{ route('account.liked.destroy', $post->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
