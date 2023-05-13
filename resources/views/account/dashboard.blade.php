@extends('account.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Личный кабинет</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $data['category_count'] }}</h3>

                                <p>Категории</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-list"></i>
                            </div>
                            <a href="{{ route('admin.category.index') }}" class="small-box-footer">Все категории <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $data['tag_count'] }}</sup></h3>

                                <p>Тэги</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-tags mr-1"></i>
                            </div>
                            <a href="{{ route('admin.tag.index') }}" class="small-box-footer">Все тэги <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $data['post_count'] }}</h3>

                                <p>Посты</p>
                            </div>
                            <div class="icon">
                                <i class="fa-regular fa-paste mr-1"></i>
                            </div>
                            <a href="{{ route('admin.post.index') }}" class="small-box-footer">Все посты <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $data['user_count'] }}</h3>

                                <p>Пользователи</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-users mr-1"></i>
                            </div>
                            <a href="{{ route('admin.user.index') }}" class="small-box-footer">Все пользователи <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
