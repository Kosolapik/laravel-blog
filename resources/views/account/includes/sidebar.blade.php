<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">Меню</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="fa-solid fa-house mr-1"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-list mr-1"></i>
                    <p>
                        Категории
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Все категории</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Добавить категорию</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-tags mr-1"></i>
                    <p>
                        Тэги
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.tag.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Все тэги</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.tag.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Добавить тэг</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-regular fa-paste mr-1"></i>
                    <p>
                        Посты
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.post.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Все посты</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.post.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Добавить пост</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-regular fa-thumbs-up mr-1"></i>
                    <p>
                        Лайки
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('account.liked.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Все лайки</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-regular fa-comments mr-1"></i>
                    <p>
                        Коментарии
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('account.comment.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Все коментарии</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
