@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Просмотр пользователя "{{ $user->name }}"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                            <li class="breadcrumb-item active">Просмотр пользователя</li>
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
                    <div class="card">
                        <div class="card-header p-2">
                            <div class="row d-flex justify-content-end">
                                <div class="col-auto">
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <a class="btn btn-outline-info" href="{{ route('admin.user.edit', $user->id) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Имя</td>
                                        <td>{{ $user->name }}</td>
                                    <tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>{{ $user->email }}</td>
                                    <tr>
                                    <tr>
                                        <td>Роль</td>
                                        <td>
                                            {{ $roles[$user->role] }}
                                        </td>
                                    <tr>
                                        <td>Дата создания</td>
                                        <td>{{ \Carbon\Carbon::parse($user->create_at)->format('d/m/Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата обновления</td>
                                        <td>{{ \Carbon\Carbon::parse($user->update_up)->format('d/m/Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата удаления</td>
                                        <td>{{ \Carbon\Carbon::parse($user->delete_at)->format('d/m/Y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
