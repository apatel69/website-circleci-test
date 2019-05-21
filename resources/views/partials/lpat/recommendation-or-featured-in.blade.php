@php
$image = get_field('recommendation_image');
$recommendation_text = get_field('recommendation_text');
$is_featured_in = get_field('is_featured_in');
$is_large_image = get_field('is_large_recommendation_image');
@endphp

@if(!$is_featured_in)
<div class="container recommendation-spacer">
  <div class="container lpat-recommendation">
    <section class="lpat-recommendation__wrapper">
        <div class="lpat-recommendation__content">
          @if($image)
          <div class="lpat-recommendation__image-wrapper">
            @include('partials.components.global-image', ['img' => $image,'classes'=>'lpat-recommendation__image'.($is_large_image?' lpat-recommendation__image--large':'')])
          </div>
          @endif
          @if($recommendation_text)
            <div class="lpat-recommendation__text">
              {!!$recommendation_text!!}
            </div>
          @endif
        </div>
    </section>
  </div>
</div>
@else
  <div class="featured-in container">
    <section>
      <span class="copy">{{ get_field('lpat_featured_label', 'option') }}</span>
      @php($logos_list = get_field('lpat_featured_logos','options'))
        @foreach ($logos_list as $key => $value)
            @php($img = $value['logo'])
            @php($logo_custom_class = isset($value['featured_in_logo_custom_class']) ? $value['featured_in_logo_custom_class'] : '')
            @php($display = $value['featured_logo_display'])
            @include('partials.components.global-image', ['img' => $img, 'classes' => 'logo hide-' . $display . ' ' . $logo_custom_class])
        @endforeach
    </section>
  </div>
@endif
