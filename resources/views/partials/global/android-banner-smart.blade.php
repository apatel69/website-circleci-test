<div class="smartbanner hide display-control">
    <div class="smartbanner-container">
        <a href="javascript:;" class="smartbanner-close">&times;</a>
        @if (get_field('banner_app_icon', 'option'))
            <span class="smartbanner-icon">
                <img src="{{ get_field('banner_app_icon', 'option')['url'] }}" alt="{{ get_field('banner_app_icon', 'option')['alt'] }}" />
            </span>
        @endif
        <div class="smartbanner-info">
            @if (get_field('banner_title', 'option'))
                <div class="smartbanner-title">{{ get_field('banner_title', 'option') }}</div>
            @endif    
            @if (get_field('banner_app_subtitle', 'option'))
                <div>{{ get_field('banner_app_subtitle', 'option') }}</div>
            @endif  
            @if (get_field('banner_app_info', 'option'))
                <span>{{ get_field('banner_app_info', 'option') }}</span>
            @endif  
        </div>
        @if (get_field('banner_app_url', 'option'))
            <a href="{{ get_field('banner_app_url', 'option') }}" class="smartbanner-button">
                <span class="smartbanner-button-text">{{ get_field('banner_cta_text', 'option') }}</span>
            </a>
        @endif
    </div>
</div>
    