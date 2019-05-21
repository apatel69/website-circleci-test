<div class="container" id="main-content">
	<section>
		<div class="two-col">
			<div class="col">
				<nav class="addons-categories">
					@include ('partials.integrations.sidebar')
				</nav>
			</div>
			<div class="col main-col">
				<a href="#" class="btn-filter-sort">Filter &amp; Sort</a>
				<div class="modal-filter">
					<a href="#" class="btn-modal-close btn-cancel">Cancel</a>
					<span class="modal-title">Filter &amp; Sort</span>
					<div class="inner-modal">
						<span class="title">Filter By Category</span>
					</div>
					<div class="controls-categories">
						<div class="category-wrap">
							@include ('partials.integrations.sidebar')
						</div>
					</div>
					<div class="inner-modal">
						<div class="controls-sort">
							<span class="title">Sort By</span>
							<div class="btn-wrap">
								<a href="#" class="btn-content-toggle btn-modal-close active" data-target="popular">Popular</a>
								<a href="#" class="btn-content-toggle btn-modal-close" data-target="alpha">A-Z</a>
								<a href="#" class="btn-content-toggle btn-modal-close" data-target="time">Newest</a>
							</div>
						</div>
					</div>
				</div>
				<div class="sort-wrap">
					<a class="visible" href="#"><span class="label-desktop">Sort By</span><span class="label-tablet">Filter &amp; Sort</span></a>
					<div class="clr"></div>
					<div class="spacer">
						<div class="inner-sort">
							<div class="label-tablet">
								<span class="title">Filter By Category</span>
                @include ('partials.integrations.sidebar')
								<span class="title">Sort By</span>
							</div>
							<a href="#" class="btn-content-toggle active" data-target="popular">Popular</a>
							<a href="#" class="btn-content-toggle" data-target="alpha">A-Z</a>
							<a href="#" class="btn-content-toggle" data-target="time">Newest - Oldest</a>
						</div>
					</div>
				</div>
				<div class="card-collection-wrap">
          <div class="card-collection content-item">
            @php
				if (is_archive()) {
					$category = get_queried_object()->slug;
					$loop = new WP_Query(
							array(
							'post_type' => 'integrations',
							'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
							'tax_query' => array(
								array (
									'taxonomy' => 'integration_categories',
									'field' => 'slug',
									'terms' => $category,
								)
							),
						)
					);
				} else {
					$loop = new WP_Query(
						array(
							'post_type' => 'integrations',
							'posts_per_page' => -1,
							'orderby' => 'menu_order',
                            'order' => 'ASC',
						)
					);
				}
            @endphp
            @while( $loop->have_posts() )
              @php
                $loop->the_post();
                global $post;
              @endphp
              @include ('partials.integrations.app-card', ['post' => $post])
            @endwhile
			@php wp_reset_postdata(); @endphp
          </div>
				</div>
			</div>
		</div>
	</section>
</div>
