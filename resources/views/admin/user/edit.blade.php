@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя "{{ $user->name }}"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                            <li class="breadcrumb-item active">Редактирование пользователя</li>
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
                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Имя пользователя</label>
                                <input class="form-control" type="text" name="name"
                                    placeholder="Введите новое имя пользователя ..." value="{{ $user->name }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>E-mail пользователя</label>
                                <input class="form-control" type="text" name="email"
                                    placeholder="Введите новый e-mail пользователя ..." value="{{ $user->email }}">
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label>Пароль пользователя</label>
                                <input class="form-control" type="text" name="password"
                                    placeholder="Введите новый пароль пользователя ..." {{ $user->password }}>
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label>Роль пользователя</label>
                                @error('role')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <select class="form-control" name="role">
                                    <option>Выберите роль пользователя</option>
                                    @foreach ($roles as $id => $role)
                                        <option value="{{ $id }}" {{ $id == $user->role ? ' selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
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
