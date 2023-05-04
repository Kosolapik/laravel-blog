@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование категории "{{ $category->title }}"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Категории</a></li>
                            <li class="breadcrumb-item active">Редактирование категорию</li>
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
                    <div class="col-6">
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Новое название категории</label>
                                <input class="form-control" type="text" name="title"
                                    placeholder="Введите новое название категории ..." value="{{ $category->title }}">
                                @error('title')
                                    <div class="text-danger">
                                        Поле "Название категории" обязательно для заполнения
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary float-right" value="Изменить">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
