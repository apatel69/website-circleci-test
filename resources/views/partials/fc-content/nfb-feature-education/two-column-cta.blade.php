@php
$ctaTitle = get_sub_field('cta_title');
$ctaId = preg_replace("/[^a-zA-Z]+/", "", $ctaTitle)
@endphp

@if ($ctaTitle !== "")
    <div id="{{$ctaId}}" class="content two-column-image-cta container">
        <h2>{{$ctaTitle}}</h2>
@else
    <div class="content two-column-image-cta container">
@endif
   
@if (have_rows('tool_tips'))
  <div class="two-column-image-cta-tooltips">
    <div class="two-column-image-cta-columns">
    @while (have_rows('tool_tips'))@php(the_row())
      <div class="two-column-image-cta-tooltip two-column-column">
        @if (get_sub_field('tool_tip_image'))
          @include('partials.components.global-image', ['img' => get_sub_field('tool_tip_image'),'classes' => 'two-column-image-cta-tooltip-image' ])     
        @endif
      </div>
    @endwhile
    </div>
  </div>
@endif
   
@if (have_rows('column'))
<div class="two-column-image-cta-columns">
    @while (have_rows('column'))@php(the_row())
        <div class="two-column-column two-column-image-cta-columns-description">
          @if (get_sub_field('image'))
            @include('partials.components.global-image', ['img' => get_sub_field('image'),'classes' => 'two-column-image-cta-img' ])  
          @endif
          <h3 class="two-column-image-cta-title">{{get_sub_field('title')}}</h3>
            {!! get_sub_field('description') !!}
            @if (get_sub_field('cta_link'))
              @include('partials.components.global-link', ['btn' => get_sub_field('cta_link'), 'classes' => 'primary-cta'])
            @endif
          </div>
    @endwhile
      </div>
@endif
</div>