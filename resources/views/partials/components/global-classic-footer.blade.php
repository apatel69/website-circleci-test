<div class="classic-footer">
    <div class="footer-logo truste" id="cf5745b1-68a7-4df0-abe3-99164468a5dc">
        <a href="//privacy.truste.com/privacy-seal/validation?rid=b7a183e6-d5b9-478a-b880-5588656351e8" title="TRUSTe Privacy Certification" target="_blank">
            <img style="border: none" src="//privacy-policy.truste.com/privacy-seal/seal?rid=b7a183e6-d5b9-478a-b880-5588656351e8" alt="TRUSTe Privacy Certification"/>
        </a>
    </div>
    <p>{!! get_field('classic_footer_text', 'option') !!}</p>
    @if ( has_nav_menu( 'classic-footer' ) )
        {!! wp_nav_menu([
            'theme_location' 	=> 'classic-footer',
            'container'         => false
        ]) !!}
    @endif
</div>