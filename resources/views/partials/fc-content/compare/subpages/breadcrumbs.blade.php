@if ($post->post_parent)
    <div class="container breadcrumb-container">
        <section>
            <div class="breadcrumbs">
                <a href="{{ get_permalink( $post->post_parent ) }}"><span>{{ get_field('compare_breadcrumb_label', 'option')}}</span></a>
                <img src="@asset('images/icons/breadcrumb-direction.svg')" alt="Breadcrumb Arrow" class="arrow">
                <span class="current">
                    <span>{{ get_field('breadcrumb_label') }}</span>
                </span>
            </div>
        </section>
    </div>
@endif