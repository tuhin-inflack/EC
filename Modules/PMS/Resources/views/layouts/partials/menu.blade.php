<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ is_active_route('pms') }} nav-item">
                    <a href="{{ url('pms') }}"><i class="la la-home"></i><span class="menu-title"
                                                                               data-i18n="nav.dash.main">@lang('labels.dashboard')</span></a>
                </li>
                <li class="{{ is_active_route('project.index') }} nav-item">
                    <a href="{{ route('project.index') }}"><i class="la la-home"></i><span class="menu-title"
                                                                               data-i18n="nav.dash.main">@lang('pms::project_proposal.projects')</span></a>
                </li>
                <li class="{{is_active_route('project-request.index')}}">
                    <a href="{{route('project-request.index')}}">
                        <i class="la la-list"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{trans('pms::project_proposal.project_request')}}</span>
                    </a>
                </li>
                <li class="{{is_active_route('requested-project.index')}}">
                    <a href="{{route('requested-project.index')}}">
                        <i class="la la-list"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{trans('pms::project_proposal.invited_project_request')}}</span>
                    </a>
                </li>
                <li class="{{is_active_route('project-proposal-submission.index')}}">
                    <a href="{{route('project-proposal-submission.index')}}">
                        <i class="la la-list"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{trans('pms::project_proposal.submitted_proposal')}}</span>
                    </a>
                </li>
                <li class="{{is_active_route('project-proposal-submitted.index')}}">
                    <a href="{{route('project-proposal-submitted.index')}}">
                        <i class="la la-list"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{trans('pms::project_proposal.received_proposal')}}</span>
                    </a>
                </li>
                <li class="{{ is_active_route('attributes.index') }} nav-item">
                    <a href="{{ route('attributes.index') }}"><i class="la la-list"></i><span class="menu-title"
                                                                               data-i18n="nav.dash.main">@lang('pms::attribute.attribute_list')</span></a>
                </li>
            </ul>
        @endauth
    </div>
</div>
