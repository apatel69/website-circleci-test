<div class="container">
    <section class="footer-cta">
        <div class="footer-cta-content">
            <h3>{{get_field('footer_cta')['copy']}}</h3>
        @include('partials.components.global-link', ['btn' => get_field('footer_cta')['cta']])
        </div>   
    </section>
</div>
