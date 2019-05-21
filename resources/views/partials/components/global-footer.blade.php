<div class="container">
    <div class="footer-social">
        <div class="mobile-apps-footer">
            <div class="mobile-icons-footer">
                @include('partials.components.global-mobile-apps')
            </div>
        </div>
        @if (have_rows('footer_social_media', 'option'))
            <div class="social-copyright">
                <div class="social-icons">
                    @while(have_rows('footer_social_media', 'option'))
                        @php (the_row())
                        <a href="{{ get_sub_field('footer_social_media_url') }}" class="social-icon" target="_blank" rel="nofollow noopener" title="{{ get_sub_field('footer_social_media_name') }}">
                            <img src="{{ get_sub_field('footer_social_media_icon')['url'] }}" alt="{{ get_sub_field('footer_social_media_icon')['alt'] }}">
                        </a>
                    @endwhile
                </div>
        @endif
                <div class="footer-copy copyright desktop">
                    <span>
                        @if (get_field("enable_custom_footer_text") == "1")
                            {{get_field('footer_custom_text')}}
                        @else
                            @php ($field_name = App\is_uk(get_the_ID()) ? 'footer_copyright_text_uk' : 'footer_copyright_text')
                            @if ($footer_string = get_field($field_name, 'option'))
                                {{ str_replace('#!year!#', date("Y"), $footer_string) }}
                            @endif
                        @endif
                    </span>
                </div>
        @if (have_rows('footer_social_media', 'option'))
            </div>
        @endif
        <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting" class="footer-logo">
    </div>

    @if ( App\is_post_type('invoice_templates') || is_tax('invoice_templates_categories') || $page_template == "invoice-templates.blade.php" || $page_template == "invoice-templates-flexible.blade.php" )
        @include('partials.invoice-templates.invoice-templates-footer')
    @endif
</div>
