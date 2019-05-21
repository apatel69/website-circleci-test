@php
    global $template;
    $cpt_template = basename($template);
    $section = isset($counter) ? 'section' . $counter : '';
	$relative = get_sub_field('relative') !== false && get_sub_field('relative') ? true : false;
@endphp

@if (get_sub_field('tab-menu'))
	@php ($menu_location = get_sub_field('tab-menu'))
	<div id="{{ $section }}" class="container no-side-pad">
		<section class="mobile-submenu-container">
			<div class="select-wrap">
				@if ( has_nav_menu( $menu_location ) )
					{!! wp_nav_menu([
						'theme_location' => $menu_location,
						'items_wrap'     => '<select id="drop-nav">%3$s</select>',
						'walker'  => new Walker_Nav_Menu_Dropdown
					]) !!}
				@endif
			</div>
		</section>

		<div class="sticky-spacer"></div>
		<section class="submenu-container {{ $relative ? 'not-sticky' : '' }}">
			<nav class="menu-items {{ $relative ? 'subheader-relative' : '' }}" role="navigation">
				@if (has_nav_menu($menu_location))
					@if ($cpt_template == "single-press_releases.blade.php" || $cpt_template == "single-data_research.blade.php")
						{!! wp_nav_menu([
							'theme_location' 	=> $menu_location,
							'container' 		=> false,
							'menu_class'		=> 'sub-header-menu',
							'menu_id' 			=> '',
							'walker'  => new Walker_Nav_Press_Menu
						]) !!}
					@else
						{!! wp_nav_menu([
							'theme_location' 	=> $menu_location,
							'container' 		=> false,
							'menu_class'		=> 'sub-header-menu',
							'menu_id' 			=> ''
						]) !!}
					@endif
				@endif
			</nav>
		</section>
	</div>
@endif
