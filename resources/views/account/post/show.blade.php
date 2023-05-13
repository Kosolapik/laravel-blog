@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Просмотр поста "{{ $post->title }}"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                            <li class="breadcrumb-item active">Просмотр поста</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <div class="row float-right gx-2">
                            <div class="col">
                                <a class="btn btn-outline-info" href="{{ route('admin.post.edit', $post->id) }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                            </div>
                            <div class="col">
                                <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-lg-6">
                        <div class="card-header p-2">
                            <h3 class="ml-2">{{ $post->title }}</h3>
                            <div class="row ml-1">
                                @foreach ($tags as $tag)
                                    <span class="badge badge-success m-1">{{ '#' . $tag->title }}</span>
                                @endforeach
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="post">
                                <div class="row mb-3">
                                    <div class="col-12 text-center">
                                        <img class="img-fluid rounded img-thumbnail" style="max-height: 300px"
                                            src="{{ asset('storage/' . $post->image) }}" alt="image">
                                    </div> <!-- /.col -->
                                </div> <!-- /.row -->
                                <p>
                                    {!! $post->content !!}
                                </p>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
