<div class="header-frame header-blue">
	<div class="header-banner hide-tablet">
		<!-- Control phone banner -->
		<div class="banner-phone display-control">
			{!! get_field('classic_phone_banner_text', 'option') !!}
		</div>
	</div>
	<div class="responsive-header">
		<div class="header-wrapper">
			<div class="fresh-index">
				<div class="freshbooks-logo">
					@if (get_field('override_classic_logo') && get_field('custom_classic_logo'))
						@include('partials.components.global-image', ['img' => get_field('custom_classic_logo')])
					@else
						@include('partials.components.global-image', ['img' => get_field('classic_logo', 'option')])
					@endif
					<span class="a11y-hidden u-a11y-hidden">FreshBooks</span>
				</div>
			</div>
			<a href="#" class="button-nav-primary hide-desktop" data-toggle="toggle-primary-nav">
				<span class="button-label">Menu</span>
				<div class="menu-icon" role="button">
					<span class="menu-icon-span1"></span>
					<span class="menu-icon-span2"></span>
					<span class="menu-icon-span3"></span>
					<span class="menu-icon-span4"></span>
				</div>
			</a>
			<nav role="navigation" class="nav-primary">
				<div class="nav-primary-menuwrap">
					@if (get_field('override_classic_menu'))
						@if ( has_nav_menu( get_field('custom_classic_menu') ) )
							{!! wp_nav_menu([
								'theme_location' 	=> get_field('custom_classic_menu'),
								'container' 		=> false
							]) !!}
						@endif
					@else
						@if ( has_nav_menu( 'classic-header' ) )
							{!! wp_nav_menu([
								'theme_location' 	=> 'classic-header',
								'container' 		=> false
							]) !!}
						@endif
					@endif
				</div>
			</nav>
		</div>
	</div>
</div>
