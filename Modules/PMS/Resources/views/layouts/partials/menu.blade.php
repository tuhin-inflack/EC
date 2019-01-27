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
                {{--<li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title"
                                                                                  data-i18n="nav.navbars.main">{{trans('pms::project_proposal.menu_title')}}</span></a>
                    <ul class="menu-content">

                        <li class="{{ is_active_route('project-request.create') }}">
                            <a href="{{ route('project-request.create') }}">
                                <i class="la la-plus-circle"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">{{trans('pms::project_proposal.create_project_proposal')}}</span>
                            </a>
                        </li>


                    </ul>
                </li>--}}
                <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title"
                                                                                       data-i18n="nav.navbars.main">{{trans('pms::project_proposal.requested_project_project')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{is_active_route('requested-project.index')}}">
                            <a href="{{route('requested-project.index')}}">
                                <i class="la la-list"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">{{trans('pms::project_proposal.requested_project_project_list')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title"
                                                                                       data-i18n="nav.navbars.main">{{ trans('pms::project_proposal.proposal_submission') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{is_active_route('project-proposal-submission.index')}}">
                            <a href="{{route('project-proposal-submission.index')}}">
                                <i class="la la-list"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">{{trans('pms::project_proposal.proposal_submission_list')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title"
                                                                                       data-i18n="nav.navbars.main">{{trans('pms::project_proposal.received_proposal')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{is_active_route('project-proposal-submitted.index')}}">
                            <a href="{{route('project-proposal-submitted.index')}}">
                                <i class="la la-list"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">{{trans('pms::project_proposal.received_proposal_list')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="{{ is_active_route('attributes.index') }} nav-item">
                    <a href="{{ route('attributes.index') }}"><i class="la la-list"></i><span class="menu-title"
                                                                               data-i18n="nav.dash.main">@lang('pms::attribute.attribute_list')</span></a>
                </li>
            </ul>
        @endauth
    </div>
</div>
