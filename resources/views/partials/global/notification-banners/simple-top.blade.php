<div id="{{ $bid }}" class="banner banner-sm banner-yellow banner-top banner-hidden">
    <div class="banner-sm-copy {{ !empty($content['simple_top_content']['button_text']) ? 'with-cta' : '' }}">
        <span>
            {{ $content['simple_top_content']['message_text'] ?: "" }}
            @if ($content['simple_top_content']['button_text'])
                <span class="banner-sm-cta banner-close">
                    {{ !empty($content['simple_top_content']['button_text']) ? $content['simple_top_content']['button_text'] : "Okay" }}
                </span>
            @else
                <span class="banner-sm-close banner-close">
                    &times;
                </span>
            @endif
        </span>
    </div>
</div>
