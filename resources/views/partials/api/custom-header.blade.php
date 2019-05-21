@php($header = get_field('api_custom_header', 'option'))
<nav role="navigation" class="nav-item">
    @if ($header['override_menu'])
        <a class="header-text override" href="{{ $header['override_content']['url'] }}">{{ $header['override_content']['title'] }}</a>
    @else
        @if ($header['custom_header_text'])
            <div class="header-text">
                {!! $header['custom_header_text'] !!}
            </div>
        @endif
        @if ($header['custom_header_menu'])
            @php ($menu = $header['custom_header_menu'])
            @if (has_nav_menu($menu))
                {!! wp_nav_menu([
                'theme_location' 	=> $menu,
                'container' 		=> false,
                ]) !!}
            @endif
        @endif
    @endif
</nav>

@if ($header['include_mobile_nav'])
    <div class="mobile-nav">
        <div class="mobile-nav-wrapper">
            <div class="container">
                <a href="{{ home_url('/') }}" class="nav-logo">
                    @if ($header['custom_logo'] && $header['new_logo'])
                        <img src="{{ $header['new_logo']['url'] }}" alt="{{ $header['new_logo']['alt'] }}">
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
            @if ($header['custom_header_menu'])
                @php ($menu = $header['custom_header_menu'])
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