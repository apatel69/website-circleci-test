<div class="nav-wrapper">
    <div class="container">
        <a href="{{ home_url('/') }}" class="nav-logo">
            @php($post_type = get_post_type())
            @if (get_field('custom_logo') && get_field('new_logo'))
                <img src="{{ get_field('new_logo')['url'] }}" alt="{{ get_field('new_logo')['alt'] }}">
            @elseif (get_field($post_type . '_custom_header_custom_logo', 'option') && get_field($post_type . '_custom_header_new_logo', 'option'))
                <img src="{{ get_field($post_type . '_custom_header_new_logo', 'option')['url'] }}" alt="{{ get_field('support_custom_header_new_logo', 'option')['alt'] }}">
            @else
                <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting">
            @endif
        </a>
        @if(App\is_post_type('lpat_pages'))
            {{-- LPAT Page Custom Nav --}}
            @include('partials.lpat.custom-header-nav')
        @elseif(App\is_post_type('api'))
            {{-- API Pages Custom Nav --}}
            @include('partials.api.custom-header')
        @elseif(App\is_post_type('education'))
            @include('partials.education-pages.custom-header-nav')
        @else
            <nav role="navigation" class="nav-item">
                @if (get_field('override_menu'))

                    <a class="header-text override" href="{{ get_field('override_content')['url'] }}">{{ get_field('override_content')['title'] }}</a>

                @else
                    @if (get_field('custom_header_text'))
                        <div class="header-text">
                            {!! get_field('custom_header_text') !!}
                        </div>
                    @endif
                    @if (get_field('include_try_it_free_login') == "true")
                        <ul>
                            <li>@include('partials.components.global-link', ['btn' => get_field('login_link')])</li>
                            <li>@include('partials.components.global-link', ['btn' => get_field('try_it_free_link')])</li>
                        </ul>
                    @else
                        @if (get_field('custom_header_menu'))
                            @php ($menu = get_field('custom_header_menu'))
                            @if (has_nav_menu($menu))
                                {!! wp_nav_menu([
                                'theme_location' 	=> $menu,
                                'container' 		=> false,
                                ]) !!}
                            @endif
                        @endif
                        @if (App\is_post_type('invoice_templates') || is_tax('invoice_templates_categories') || App\is_post_type('accounting_software') || is_tax('accounting_software_categories') || App\is_post_type('support') || is_tax('support_categories') || App\is_post_type('resources'))
                            @if (has_nav_menu('alt_header_default'))
                                {!! wp_nav_menu([
                                    'theme_location' 	=> 'alt_header_default',
                                    'container' 		=> false,
                                ]) !!}
                            @endif
                        @endif
                    @endif
                @endif
            </nav>
        @endif
	</div>
    @if (get_field('include_mobile_nav'))
        <div class="mobile-nav">
            <div class="mobile-nav-wrapper">
                <div class="container">
                    <a href="{{ home_url('/') }}" class="nav-logo">
                        @if (get_field('custom_logo') && get_field('new_logo'))
                            <img src="{{ get_field('new_logo')['url'] }}" alt="{{ get_field('new_logo')['alt'] }}">
                        @else
                            <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting">
                        @endif
                    </a>
                    <a href="#" class="button-nav-primary mobile-menu" data-toggle="toggle-primary-nav">
                        <div class="menu-icon" role="button">
                            <span class="menu-icon-span1"></span>
                            <span class="menu-icon-span2"></span>
                            <span class="menu-icon-span3"></span>
                            <span class="menu-icon-span4"></span>
                        </div>
                    </a>

            </div>
        </div>
        <nav role="navigation" class="mobile-nav-items" style="display: none;">
            @if (get_field('custom_header_menu'))
                @php ($menu = get_field('custom_header_menu'))
                @if (has_nav_menu($menu))
                    {!! wp_nav_menu([
                        'theme_location' 	=> $menu,
                        'container' 		=> false,
                    ]) !!}
                @endif
            @endif
        </nav>
    </div>
@endif
