<div class="container" id="main-content">
    <section>
        <div class="two-col">
            <div class="col nav-col">
                @include ('partials.developers.sidebar')
            </div>
            <div class="col main-col">
                <div class="developers-post content-item">
                    <article @php(post_class())>
                        <div class="developers-post-content">
                            @php(the_content())
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>
