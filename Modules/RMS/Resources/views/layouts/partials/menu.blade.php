<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ is_active_route('rms.index') }}">
                    <a href="{{ route('rms.index') }}">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{ trans('labels.dashboard') }}</span></a>
                </li>
                <li class="{{ is_active_route('research.index') }}">
                    <a href="{{ route('research.index') }}">
                        <i class="la la-briefcase"></i>
                        <span class="menu-title"
                              data-i18n="nav.navbars.main">{{trans('rms::research_proposal.all_research')}}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class=""><i class="la la-briefcase"></i>
                        <span class="menu-title"  data-i18n="nav.templates.main">{{ trans('rms::research.research_brief_info') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{is_active_route('research-request.index')}}">
                            <a href="{{route('research-request.index')}}">
                                <i class="la la-list"></i>
                                <span class="menu-title"
                                      data-i18n="nav.navbars.main">{{trans('rms::research_proposal.brief_invitation')}}</span>
                            </a>
                        </li>
                        <li class="{{is_active_route('research-proposal-submission.index')}}">
                            <a href="{{route('research-proposal-submission.index')}}">
                                <i class="la la-list"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">@lang('rms::research_proposal.submitted_research_proposal')</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class=""><i class="la la-briefcase"></i>
                        <span class="menu-title"  data-i18n="nav.templates.main">{{ trans('rms::research.research_detail_info') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{is_active_route('invitations')}}">
                            <a href="{{route('invitations')}}">
                                <i class="la la-list"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">@lang('rms::research_details.detail_invitation')</span>
                            </a>
                        </li>
                        <li class="{{is_active_route('research.list')}}">
                            <a href="{{route('research.list')}}">
                                <i class="la la-list"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">@lang('rms::research_details.research_detail')</span>
                            </a>
                        </li>
                    </ul>
                </li>



            </ul>
        @endauth
    </div>
</div>
