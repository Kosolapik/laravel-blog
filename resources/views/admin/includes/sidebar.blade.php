<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">Меню</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="fa-solid fa-house"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-list"></i>
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
                    <i class="fa-solid fa-tags"></i>
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
                    <i class="fa-regular fa-paste"></i>
                    <p>
                        Посты
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Все посты</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Добавить пост</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-users"></i>
                    <p>
                        Пользователи
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Все пользователи</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Добавить пользователя</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
