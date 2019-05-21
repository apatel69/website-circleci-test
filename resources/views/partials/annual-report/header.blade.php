@php
    $header = get_field('api_custom_header', 'option');
    $menu = 'annual-report-menu';
@endphp

<div class="desktop-nav">
    <div class="container">
        <a href="{{ home_url('/') }}" class="nav-logo">
            <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting" width="120">
        </a>
        <div class="primary-nav">
            <div class="core">
                @if (has_nav_menu($menu))
                    {!! wp_nav_menu([
                        'theme_location'    => $menu, 
                        'container'         => false, 
                        'menu_class'        => '', 
                        'menu_id'           => '', 
                        'walker'            => new Primary_Nav_With_Description]) !!}
                @endif
            </div>
        </div>
    </div>
</div>

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
        @if (has_nav_menu($menu))
            {!! wp_nav_menu([
                'theme_location'    => $menu, 
                'container'         => false, 
                'menu_class'        => 'mobile_nav', 
                'menu_id'           => '', 
                'link_before'       => '<span>','
                link_after'         =>'</span>', 
                'walker'            => new Primary_Nav_With_Description]) !!}
        @endif
    </nav>
</div>