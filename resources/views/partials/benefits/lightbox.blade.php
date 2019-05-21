<div class="section-lightbox" id="lightbox">
    <div class="lightbox-video-container">
        <!-- responsive embed code and css from http://embedresponsively.com -->
        <div class="embed-container">
            <iframe src="{{ get_field('video_embed_url') }}" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    @include('partials.benefits.subscribe-form')
</div>