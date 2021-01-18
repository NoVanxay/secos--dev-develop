<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('history_admin_teacher_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.history-admin-teachers.index") }}" class="nav-link {{ request()->is("admin/history-admin-teachers") || request()->is("admin/history-admin-teachers/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-address-book">

                            </i>
                            <p>
                                {{ trans('cruds.historyAdminTeacher.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('academic_year_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.academic-years.index") }}" class="nav-link {{ request()->is("admin/academic-years") || request()->is("admin/academic-years/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.academicYear.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('school_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/schools*") ? "menu-open" : "" }} {{ request()->is("admin/class-rooms*") ? "menu-open" : "" }} {{ request()->is("admin/subjects*") ? "menu-open" : "" }} {{ request()->is("admin/students*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-school">

                            </i>
                            <p>
                                {{ trans('cruds.schoolManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('school_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.schools.index") }}" class="nav-link {{ request()->is("admin/schools") || request()->is("admin/schools/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-school">

                                        </i>
                                        <p>
                                            {{ trans('cruds.school.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('class_room_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.class-rooms.index") }}" class="nav-link {{ request()->is("admin/class-rooms") || request()->is("admin/class-rooms/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.classRoom.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('subject_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.subjects.index") }}" class="nav-link {{ request()->is("admin/subjects") || request()->is("admin/subjects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-graduation-cap">

                                        </i>
                                        <p>
                                            {{ trans('cruds.subject.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('student_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.students.index") }}" class="nav-link {{ request()->is("admin/students") || request()->is("admin/students/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-graduate">

                                        </i>
                                        <p>
                                            {{ trans('cruds.student.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('content_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/content-categories*") ? "menu-open" : "" }} {{ request()->is("admin/contents*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-pencil-alt">

                            </i>
                            <p>
                                {{ trans('cruds.contentManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('content_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-categories.index") }}" class="nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contents.index") }}" class="nav-link {{ request()->is("admin/contents") || request()->is("admin/contents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.content.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('annoucement_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.annoucements.index") }}" class="nav-link {{ request()->is("admin/annoucements") || request()->is("admin/annoucements/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.annoucement.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('policy_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.policies.index") }}" class="nav-link {{ request()->is("admin/policies") || request()->is("admin/policies/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.policy.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('download_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/textbooks*") ? "menu-open" : "" }} {{ request()->is("admin/manuals*") ? "menu-open" : "" }} {{ request()->is("admin/templates*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-file-download">

                            </i>
                            <p>
                                {{ trans('cruds.download.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('textbook_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.textbooks.index") }}" class="nav-link {{ request()->is("admin/textbooks") || request()->is("admin/textbooks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-pdf">

                                        </i>
                                        <p>
                                            {{ trans('cruds.textbook.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('manual_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.manuals.index") }}" class="nav-link {{ request()->is("admin/manuals") || request()->is("admin/manuals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-pdf">

                                        </i>
                                        <p>
                                            {{ trans('cruds.manual.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('template_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.templates.index") }}" class="nav-link {{ request()->is("admin/templates") || request()->is("admin/templates/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-pdf">

                                        </i>
                                        <p>
                                            {{ trans('cruds.template.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('book_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/categories*") ? "menu-open" : "" }} {{ request()->is("admin/books*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.bookManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.category.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('book_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.books.index") }}" class="nav-link {{ request()->is("admin/books") || request()->is("admin/books/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.book.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('faq_management_access')
                <li class="nav-item has-treeview {{ request()->is("admin/faq-categories*") ? "menu-open" : "" }} {{ request()->is("admin/faq-questions*") ? "menu-open" : "" }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-question">

                        </i>
                        <p>
                            {{ trans('cruds.faqManagement.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('faq_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.faq-categories.index") }}" class="nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon fas fa-briefcase">

                                    </i>
                                    <p>
                                        {{ trans('cruds.faqCategory.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('faq_question_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.faq-questions.index") }}" class="nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon fas fa-question">

                                    </i>
                                    <p>
                                        {{ trans('cruds.faqQuestion.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
