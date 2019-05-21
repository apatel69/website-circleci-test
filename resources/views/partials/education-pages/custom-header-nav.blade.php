<nav role="navigation" class="nav-item lpat-custom-header-nav">
    @if (get_field('override_menu','options'))
        <a class="header-text override" href="{{ get_field('override_content','options')['url'] }}">{{ get_field('override_content','options')['title'] }}</a>
    @else

        @if (get_field('custom_header_text','options') !== '')
            <div class="header-text">
                {!! get_field('custom_header_text','options') !!}
            </div>
        @endif

        @if (get_field('include_try_it_free_login','options') == "true")
            <ul>
                <li>@include('partials.components.global-link', ['btn' => get_field('login_link','options')])</li>
                <li>@include('partials.components.global-link', ['btn' => get_field('try_it_free_link','options')])</li>
            </ul>
        @else

            @if (get_field('custom_header_menu','options'))
                @php ($menu = get_field('custom_header_menu','options'))
                @if (has_nav_menu($menu))
                    {!! wp_nav_menu([
                        'theme_location' 	=> $menu,
                        'container' 		=> false,
                    ]) !!}
                @endif
            @endif

            <a href="{{ get_field('sign_up_link', 'option') }}" class="btn-trial" target="_blank" rel="noopener">{{ get_field('sign_up_link_text', 'option') }}</a>

            @if (App\is_post_type('invoice_templates') || is_tax('invoice_templates_categories') || App\is_post_type('accounting_software') || is_tax('accounting_software_categories'))
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
