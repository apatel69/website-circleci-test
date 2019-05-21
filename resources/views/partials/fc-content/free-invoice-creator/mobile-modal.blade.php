<div id="fic-mobile-modal" class="show-modal--false">
    <div class="fic-mobile-modal-content">
        <div class="fic-mobile-modal-logo"> @include('partials.components.global-image', ['img' => get_field('mobile_modal')['logo']])</div>
        <h2>
            {{get_field('mobile_modal')['title']}}
        </h2>
        <div class="fic-mobile-modal-copy-text">{!! get_field('mobile_modal')['message'] !!}</div>
        @include('partials.components.global-image', ['img' => get_field('mobile_modal')['footer_image'],'classes' => 'fic-mobile-modal-footer-image'])
    </div>
</div>