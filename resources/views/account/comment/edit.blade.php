@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование комментария</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('account.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('account.comment.index') }}">Комментарии</a></li>
                            <li class="breadcrumb-item active">Редактирование комментария</li>
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
                        <form action="{{ route('account.comment.update', $comment->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Комментарий</label>
                                <textarea class="form-control" type="text" name="message" placeholder="Введите новое название категории ...">{{ $comment->message }}</textarea>
                                @error('message')
                                    <div class="text-danger">
                                        Поле "Комментарий" обязательно для заполнения
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" value="Изменить">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
