<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (can('dashboard.index'))
        <li class="nav-item {{ Request::routeIs('admin.home') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">@lang('admin.dashboard')</span>
            </a>
        </li>
        @endif

        @if (can('rates.index'))
        <li class="nav-item {{ Request::routeIs('admin.rates.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.rates.index') }}">
                <i class="icon-list menu-icon"></i>
                <span class="menu-title">@lang('admin.Rates') </span>
            </a>
        </li>
        @endif
        @if (can('ratesMachine.index'))
        <li class="nav-item {{ Request::routeIs('admin.ratesMachine.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.ratesMachine.index') }}">
                <i class="icon-list menu-icon"></i>
                <span class="menu-title"> @lang('admin.ratesMachine')</span>
            </a>
        </li>
        @endif


        @if (can('banks.index'))
        <li class="nav-item {{ Request::routeIs('admin.banks.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.banks.index') }}">
                <i class="icon-list menu-icon"></i>
                <span class="menu-title"> @lang('admin.Banks')</span>
            </a>
        </li>
        @endif

        @if (can('types.index') || can('goals.index') || can('entities.index') || can('usages.index'))
        <li
            class="nav-item {{ Request::routeIs('admin.types.*') || Request::routeIs('admin.entities.*') || Request::routeIs('admin.goals.*') || Request::routeIs('admin.usages.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#categories-elements" aria-expanded="false"
                aria-controls="categories-elements">
                <i class="icon-equalizer menu-icon"></i>
                <span class="menu-title">@lang('admin.Categories')</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::routeIs('admin.types.*') || Request::routeIs('admin.entities.*') || Request::routeIs('admin.goals.*') || Request::routeIs('admin.usages.*') ? 'show' : '' }}"
                id="categories-elements">
                <ul class="nav flex-column sub-menu">
                    @if (can('goals.index'))

                    <li class="nav-item {{ Request::routeIs('admin.goals.*') ? 'activeItem' : '' }}">
                        <a class="nav-link" href="{{ route('admin.goals.index') }}">
                            @lang('admin.Goals')
                        </a>
                    </li>
                    @endif
                    @if (can('entities.index'))

                    <li class="nav-item {{ Request::routeIs('admin.entities.*') ? 'activeItem' : '' }}">
                        <a class="nav-link" href="{{ route('admin.entities.index') }}">
                            @lang('admin.Entities')
                        </a>
                    </li>
                    @endif
                    @if (can('usages.index'))

                    <li class="nav-item {{ Request::routeIs('admin.usages.*') ? 'activeItem' : '' }}">
                        <a class="nav-link" href="{{ route('admin.usages.index') }}">
                            @lang('admin.Usages')
                        </a>
                    </li>
                    @endif
                    @if (can('types.index'))

                    <li class="nav-item {{ Request::routeIs('admin.types.*') ? 'activeItem' : '' }}">
                        <a class="nav-link" href="{{ route('admin.types.index') }}">
                            @lang('admin.Types')
                        </a>
                    </li>
                    @endif



                </ul>
            </div>
        </li>
        @endif
        @if (can('ratesMachine.index') )
        <li class="nav-item {{ Request::routeIs('admin.typesmachines.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#CategoriesM-elemeeeeets" aria-expanded="false"
                aria-controls="CategoriesM-elemeeeeets">
                <i class="icon-equalizer menu-icon"></i>
                <span class="menu-title">
                    @lang('admin.CategoriesM')
                </span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::routeIs('admin.typesmachines.*') ? 'show' : '' }}"
                id="CategoriesM-elemeeeeets">
                <ul class="nav flex-column sub-menu">



                @if (can('ratesMachine.index'))

<li class="nav-item {{ Request::routeIs('admin.goalmachines.*') ? 'activeItem' : '' }}">
    <a class="nav-link" href="{{ route('admin.goalmachines.index') }}">
    @lang('admin.Goals')
    </a>
</li>
@endif



                </ul>
            </div>
        </li>
        @endif



        <li class="nav-item {{ Request::routeIs('admin.settings.*')  ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#setting-elements" aria-expanded="false"
                aria-controls="setting-elements">
                <i class="icon-cog menu-icon"></i>
                <span class="menu-title">@lang('admin.Settings')</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::routeIs('admin.settings.*')  ? 'show' : '' }}" id="setting-elements">
                <ul class="nav flex-column sub-menu">

                    @if (can('settings.index'))
                    <li class="nav-item {{ Request::routeIs('admin.settings.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.settings.index') }}">
                            <span class="menu-title">@lang('admin.Settings_all') </span>
                        </a>
                    </li>
                    @endif
                    @if (can('settings.index'))
                    <li class="nav-item {{ Request::routeIs('admin.settings.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                            <span class="menu-title">@lang('admin.sliders') </span>
                        </a>
                    </li>
                    @endif

                    @if (can('services.index'))
                    <li class="nav-item {{ Request::routeIs('admin.services.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.services.index') }}">
                            <span class="menu-title">@lang('admin.Services') </span>
                        </a>
                    </li>
                    @endif
                    @if (can('services.index'))
                    <li class="nav-item {{ Request::routeIs('admin.sub_services.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.sub_services.index') }}">
                            <span class="menu-title">@lang('admin.Sub_services') </span>
                        </a>
                    </li>
                    @endif
                    @if (can('services.index'))
                    <li class="nav-item {{ Request::routeIs('admin.blog.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.blog.index') }}">
                            <span class="menu-title">@lang('admin.Blog') </span>
                        </a>
                    </li>
                    @endif
                    @if (can('services.index'))
                    <li class="nav-item {{ Request::routeIs('admin.rating.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.rating.index') }}">
                            <span class="menu-title">@lang('admin.Rating') </span>
                        </a>
                    </li>
                    @endif
                    <!---->
                    @if (can('services.index'))
                    <li class="nav-item {{ Request::routeIs('admin.privacy.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.privacy.index') }}">
                            <span class="menu-title">@lang('admin.privacy') </span>
                        </a>
                    </li>
                    @endif

                    @if (can('messages.index'))
                    <li class="nav-item {{ Request::routeIs('admin.messages.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.messages.index') }}">
                            <span class="menu-title">@lang('admin.messages') </span>
                        </a>
                    </li>
                    @endif


                    @if (can('newsletter.index'))
                    <li class="nav-item {{ Request::routeIs('admin.newsletter.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.newsletter.index') }}">
                            <span class="menu-title">@lang('admin.newsletter') </span>
                        </a>
                    </li>
                    @endif






                    <!---->

                    @if (can('counters.index'))
                    <li class="nav-item {{ Request::routeIs('admin.counters.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.counters.index') }}">
                            <span class="menu-title">@lang('admin.Counters') </span>
                        </a>
                    </li>
                    @endif

                    @if (can('clients.index'))
                    <li class="nav-item {{ Request::routeIs('admin.clients.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.clients.index') }}">
                            <span class="menu-title">@lang('admin.Clients') </span>
                        </a>
                    </li>
                    @endif

                    @if (can('about.index'))
                    <li class="nav-item {{ Request::routeIs('admin.about.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.about.index') }}">
                            <span class="menu-title">@lang('admin.About') </span>
                        </a>
                    </li>
                    @endif

                    @if (can('objectives.index'))
                    <li class="nav-item {{ Request::routeIs('admin.objectives.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.objectives.index') }}">
                            <span class="menu-title">@lang('admin.Objectives') </span>
                        </a>
                    </li>
                    @endif
                    @if (can('standards.index'))
                    <li class="nav-item {{ Request::routeIs('admin.standards.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.standards.index') }}">
                            <!--<i class="icon-fire menu-icon"></i>-->
                            <span class="menu-title">@lang('admin.standards') </span>
                        </a>
                    </li>
                    @endif
                    @if (can('reliability.index'))
                    <li class="nav-item {{ Request::routeIs('admin.reliability.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.reliability.index') }}">
                            <!--<i class="icon-fire menu-icon"></i>-->
                            <span class="menu-title">@lang('admin.reliability') </span>
                        </a>
                    </li>
                    @endif
                    @if (can('objectives.index'))
                    <li class="nav-item {{ Request::routeIs('admin.ourseen.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.ourseen.index') }}">
                            <!-- <i class="icon-fire menu-icon"></i> -->
                            <span class="menu-title">رؤيتنا و رسالتنا </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>



        @if (can('admins.index') || can('roles.index'))
        <li
            class="nav-item {{ Request::routeIs('admin.admins.*') || Request::routeIs('admin.roles.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#admins-elements" aria-expanded="false"
                aria-controls="admins-elements">
                <i class="icon-people menu-icon"></i>
                <span class="menu-title">@lang('admin.Admins')</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::routeIs('admin.admins.*') || Request::routeIs('admin.roles.*') ? 'show' : '' }}"
                id="admins-elements">
                <ul class="nav flex-column sub-menu">
                    @if (can('admins.index'))
                    <li class="nav-item {{ Request::routeIs('admin.admins.*') ? 'activeItem' : '' }}">
                        <a class="nav-link" href="{{ route('admin.admins.index') }}">
                            @lang('admin.Admins')
                        </a>
                    </li>
                    @endif

                    @if (can('roles.index'))
                    <li class="nav-item {{ Request::routeIs('admin.roles.*') ? 'activeItem' : '' }}">
                        <a class="nav-link" href="{{ route('admin.roles.index') }}">
                            @lang('admin.Roles')
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </li>
        @endif

    </ul>
</nav>