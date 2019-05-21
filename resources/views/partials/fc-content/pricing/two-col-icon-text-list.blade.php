<div class="container feature-list" id="feature-list">
	<section>
        @if (get_sub_field('heading'))
		    <h2>{{ get_sub_field('heading') }}</h2>
        @endif
        @if (have_rows('icon_list'))
			<ul class="list-items">
                @while (have_rows('icon_list')) @php (the_row())
                    <li style="background-image: url('{{ get_sub_field('list_item_icon')['url'] }}');">{{ get_sub_field('list_item_text') }}</li>
                @endwhile
			</ul>
        @endif
	</section>
</div>