@if(get_field('use_header_banner'))
    <div class="container no-side-pad header-banner">
        @if(get_field('header_banner_text') && get_field('header_banner_phone_number'))
            <span>{!!get_field('header_banner_text')!!}
                <br class="hide-desktop">
                @if(get_field('header_banner_phone_number'))
                    <a class="phone">{{get_field('header_banner_phone_number')}}</a>
                @endif
            </span>
        @endif
    </div>
@endif
