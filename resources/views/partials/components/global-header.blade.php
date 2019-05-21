<div class="desktop-nav">
    <div class="container">
        <a href="{{ home_url('/') }}" class="nav-logo">
            <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting" width="120">
        </a>
        @include('partials.header.secondary-nav')
        <div class="primary-nav">
            <div class="core">
                <div class="button-nav">
                    @if (get_field('sign_up_link', 'option'))
                        <a class="top-level nav-item btn-primary goal-header-cta"
                           href="{{ get_field('sign_up_link', 'option')}}">{{ get_field('sign_up_link_text', 'option')}}</a>
                    @endif

                    @if (get_field('login_link', 'option'))
                        <a href="{{ get_field('login_link', 'option') }}"
                           class="top-level nav-item">{{ get_field('login_link_text', 'option')}}</a>
                    @endif
                </div>
                @if (has_nav_menu('primary_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => false, 'menu_class' => '', 'menu_id' => '', 'walker'          => new Primary_Nav_With_Description]) !!}
                @endif
            </div>
        </div>
    </div>
</div>

{{--  Mobile Navigation  --}}
<div class="mobile-nav">
    <div class="mobile-nav-bar">
        <a href="{{ home_url('/') }}" class="nav-logo">
            <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting" width="100">
        </a>
        <div class="mobile-buttons">

            @if (get_field('sign_up_link', 'option'))
                <a href="{{ get_field('sign_up_link', 'option')}}" class="btn-primary">
                    <span>{{ get_field('sign_up_link_text', 'option')}}</span>
                </a>
            @endif

            <a href="javascript:;" class="menu-toggle item-toggle" data-target="responsive-menu">
                <img src="@asset('images/navigation/nav_hamburger.svg')" alt="Open Navigation" class="open-nav"
                     width="24" height="16">
                <img src="@asset('images/navigation/nav_close.svg')" alt="Close Navigation" class="close-nav">
            </a>
        </div>
    </div>

    <div class="responsive-menu">
        @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => false, 'menu_class' => 'mobile_nav', 'menu_id' => '', 'link_before' => '<span>','link_after'=>'</span>', 'walker' => new Primary_Nav_With_Description]) !!}
        @endif

        <div class="nav-footer">
            @include('partials.header.secondary-nav')
            <div class="secondary-buttons">

                @if (get_field('sign_up_link', 'option'))
                    <a href="{{ get_field('sign_up_link', 'option')}}" class="btn-primary">
                        <span>{{ get_field('sign_up_link_text', 'option')}}</span>
                    </a>
                @endif

                @if (get_field('login_link', 'option'))
                    <a href="{{ get_field('login_link', 'option')}}"
                       class="btn-ghost">{{ get_field('login_link_text', 'option')}}</a>
                @endif

            </div>
        </div>
    </div>
</div>
