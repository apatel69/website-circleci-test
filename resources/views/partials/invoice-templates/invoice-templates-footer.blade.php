<div class="invoice-templates-footer">
    <div class="invoice-templates-footer__content-wrapper">
        <div class="invoice-templates-footer__content-wrapper__item">
            @if ( get_field('email_title', 'option') && get_field('email', 'option') )
                <p>{{ get_field('email_title', 'option') }} 
                    <a href="mailto:{{ get_field('email', 'option') }}">
                        {{ get_field('email', 'option') }}
                    </a>
                </p>
            @endif
            @if ( get_field('hours_title', 'option') && get_field('hours', 'option') )
                <p>
                    {{ get_field('hours_title', 'option') }} 
                    {{ get_field('hours', 'option') }}
                </p>
            @endif
            <p>
                @if ( get_field('terms_of_service', 'option')['title'] && get_field('terms_of_service', 'option')['url'] )
                    <a 
                        href="{{ get_field('terms_of_service', 'option')['url'] }}" 
                        target="{{ get_field('terms_of_service', 'option')['target'] }}"
                    >
                        {{ get_field('terms_of_service', 'option')['title'] }} 
                    </a>
                @endif
                @if ( get_field('privacy_policy', 'option')['title'] && get_field('privacy_policy', 'option')['url'] )
                | 
                    <a 
                        href="{{ get_field('privacy_policy', 'option')['url'] }}" 
                        target="{{ get_field('privacy_policy', 'option')['target'] }}"
                    >
                        {{ get_field('privacy_policy', 'option')['title'] }}
                    </a>
                @endif
            </p>
        </div>

        @if (have_rows('phone_numbers','options'))
            <div class="invoice-templates-footer__content-wrapper__item">
                @while(have_rows('phone_numbers','options')) @php(the_row())
                    @if ( get_sub_field('title','options') && get_sub_field('phone_num','options') )
                        <p>{{get_sub_field('title','options')}} {{get_sub_field('phone_num','options')}}</p>
                    @endif
                @endwhile
            </div>
        @endif
    </div>
    @if (get_field('itfooter_copyright_text', 'option'))
        <p class="invoice-templates-footer__copyright">
            {{ get_field('itfooter_copyright_text', 'option') }} {{ date("Y") }}
        </p>
    @endif
    <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting" class="footer-logo">
</div>