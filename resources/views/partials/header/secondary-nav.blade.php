<div class="secondary-nav">
    @php ($menu = App\is_uk(get_the_ID()) ? 'secondary-navigation_uk' : 'secondary-navigation')
    @if (has_nav_menu($menu))
        {!! wp_nav_menu([
            'theme_location' => $menu,
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => '',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => false,
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '%3$s',		
            'depth'           => 0,
            'walker'          => new Secondary_Nav_Walker
            ]) !!}
    @endif
</div>