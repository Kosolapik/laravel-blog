@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Категории</li>
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
                    <div class="col-6 mb-3">
                        <form action="{{ route('admin.category.store') }}" method="POST">
                            @csrf
                            @error('title')
                                <div class="text-danger">
                                    Для добавления новой категории введите её название
                                </div>
                            @enderror
                            <div class="input-group mb-3">
                                <input class="form-control" name="title" type="text"
                                    placeholder="Введите название новой категории"
                                    aria-label="Введите название новой категории" aria-describedby="button-addon2">
                                <input class="btn btn-primary" type="submit" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список категорий</h3>

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
                                            <th>Название</th>
                                            <th>Дата создания</th>
                                            <th>Дата оновления</th>
                                            <th colspan="3"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->title }}</td>
                                                <td>{{ $carbon::parse($category->created_at)->format('d.m.Y') }}</td>
                                                <td>{{ $carbon::parse($category->updated_at)->format('d.m.Y') }}</td>
                                                <td>
                                                    <a class="btn btn-outline-info"
                                                        href="{{ route('admin.category.show', $category->id) }}">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-info"
                                                        href="{{ route('admin.category.edit', $category->id) }}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.category.destroy', $category->id) }}"
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
