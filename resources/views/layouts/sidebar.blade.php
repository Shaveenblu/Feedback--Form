<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{asset('img.png')}}" alt="Admin Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">Feedback Form</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse bg-warning rounded"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon icon ion-ios-link  bg-primary rounded"></i>
                            <p>
                                Generate a link
                                <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('view-any', App\Models\Customer::class)
                                <li class="nav-item">
                                    <a href="{{route('generate-link')}}" class="nav-link">
                                        <i class="nav-icon icon ion-md-transgender bg-primary rounded"></i>
                                        <p>Generate</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Customer::class)
                                <li class="nav-item">
                                    <a href="{{route('copy-generated-link')}}" class="nav-link">
                                        <i class="nav-icon icon ion-md-transgender bg-primary rounded"></i>
                                        <p>Copy Link</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Customer::class)
                                <li class="nav-item">
                                    <a href="{{route('customer-form-urls.index')}}" class="nav-link">
                                        <i class="nav-icon icon ion-md-transgender bg-primary rounded"></i>
                                        <p>Generated Link</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-ios-settings bg-danger rounded"></i>
                        <p>
                            Setting
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\Customer::class)
                            <li class="nav-item">
                                <a href="{{ route('customers.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off bg-danger rounded"></i>
                                    <p>Customers</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Guide::class)
                            <li class="nav-item">
                                <a href="{{ route('guides.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off bg-danger rounded"></i>
                                    <p>Guides</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Hotel::class)
                            <li class="nav-item">
                                <a href="{{ route('hotels.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off bg-danger rounded"></i>
                                    <p>Hotels</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Question::class)
                            <li class="nav-item">
                                <a href="{{ route('questions.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off bg-danger rounded"></i>
                                    <p>Questions</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\QuestionCategory::class)
                            <li class="nav-item">
                                <a href="{{ route('question-categories.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off bg-danger rounded"></i>
                                    <p>Question Categories</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\ResponseType::class)
                            <li class="nav-item">
                                <a href="{{ route('response-types.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off bg-danger rounded"></i>
                                    <p>Response Types</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Tour::class)
                            <li class="nav-item">
                                <a href="{{ route('tours.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off bg-danger rounded"></i>
                                    <p>Tours</p>
                                </a>
                            </li>
                            @endcan
                    </ul>
                </li>
                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-key"></i>
                        <p>
                            Access Management
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', Spatie\Permission\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan
                        @can('view-any', Spatie\Permission\Models\Permission::class)
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        @endcan
                       @can('view-any', App\Models\User::class)
                           <li class="nav-item">
                               <a href="{{ route('users.index') }}" class="nav-link">
                                   <i class="nav-icon icon ion-md-radio-button-off"></i>
                                   <p>Users</p>
                               </a>
                           </li>
                       @endcan
                    </ul>
                </li>
                @endif
                @endauth
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
