@php
    $url = urlencode(get_permalink());
    $title = urlencode(get_the_title());
@endphp

<div class="social-share">
    <p>Share:</p>
    <div>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}&amp;t={{ $url }}" title="Share on Facebook" target="_blank" rel="noopener">
            <img src="{{ get_field('press_share_facebook_icon', 'option')['url'] }}" width="32px" height="32px" alt="{{ get_field('press_share_facebook_icon', 'option')['alt'] }}">
        </a>

        <a href="https://twitter.com/intent/tweet?text={{ $title }}:%20{{ $url }}" target="_blank" title="Tweet" rel="noopener">
            <img src="{{ get_field('press_share_twitter_icon', 'option')['url'] }}" width="32px" height="32px" alt="{{ get_field('press_share_twitter_icon', 'option')['alt'] }}">            
        </a>

        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $url }}&amp;title={{ $title }}" target="_blank" title="Share on LinkedIn" rel="noopener">
            <img src="{{ get_field('press_share_linkedin_icon', 'option')['url'] }}" width="32px" height="32px" alt="{{ get_field('press_share_linkedin_icon', 'option')['alt'] }}">            
        </a>
    </div>
</div>