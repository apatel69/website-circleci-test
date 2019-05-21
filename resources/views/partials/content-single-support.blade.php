<div class="container" id="main-content">
    <section>
        <div class="two-col">
            <div class="col nav-col">
                @include ('partials.support.sidebar')
            </div>
            <div class="col main-col">
                <div class="support-post content-item">
                    @include ('partials.support.breadcrumbs')

                    @php
                    $name = get_the_title();
                    $id = get_the_id();

                    $post_categories = get_post_primary_category($post->ID, 'support_categories');
                    $primary_category = $post_categories['primary_category'];
                    @endphp

                    <article @php(post_class())>
                        <h2 class="support-post-heading">{{ get_the_title() }}</h2>
                        <div class="support-post-content">
                            @php(the_content())
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>
