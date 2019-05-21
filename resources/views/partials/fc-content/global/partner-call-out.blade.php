<div class="partner-call-out container">
    <section>
        <div class="partner-call-out-body">
        @if(get_sub_field('partner_logo'))
        <div class="partner-call-out-image">
            @include('partials.components.global-image', ['img' => get_sub_field('partner_logo')])
        </div>
        @endif
        <div class="partner-call-out-text">
        @if(get_sub_field('partner_description'))
            <h2>
                {{get_sub_field('partner_description')}}
            </h2>
        @endif
        </div>
        </div>
    </section>    
</div>
