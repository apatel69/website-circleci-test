@php
$sectionTitle = get_sub_field('section_title');
$anchorId = preg_replace("/[^a-zA-Z]+/", "", $sectionTitle);
$display_second_column = get_sub_field('display_second_column') ?: '0';
$backgroundSectionId = preg_replace("/[^a-zA-Z]+/", "", get_sub_field('section_id'));
@endphp

@if (get_sub_field('background_image'))
  @include('partials.components.global-image', ['img' => get_sub_field('background_image'), 'is_background_image' => true, 'background_element_id' => $backgroundSectionId  ])  
@endif

<div class="container two-column-flexible-cta" id="{{$backgroundSectionId}}">
  @if ($sectionTitle !== "")
    <h2 id="{{$anchorId}}" class="two-column-flexible-cta-title">{{$sectionTitle}}</h2>
  @endif
  <div class="two-column-flexible-cta-columns display-second-column-{{$display_second_column}}">
    <div class="two-column-flexible-cta-column">
      <h3>{{ get_sub_field('column_title') }}</h3>
      {!! get_sub_field('column_1_content') !!}
      
      @if (!get_sub_field('cta_button'))
        @include('partials.components.global-link', ['btn' => get_sub_field('cta_button')])    
      @endif   
    </div>
    @if($display_second_column != '0')
    <div class="two-column-flexible-cta-column">
      {!! get_sub_field('column_2_content') !!}
    </div>
    @endif
  </div>

</div>