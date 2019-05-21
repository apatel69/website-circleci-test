@php
$sectionID = get_sub_field('section_id')  ? get_sub_field('section_id') : "equation-cta";
@endphp

<section>
  <div id ="{{$sectionID}}" class="equation-cta container">
    <div class="col-A">
      @if(get_sub_field('call_to_action_title'))
        <h2>{{get_sub_field('call_to_action_title')}}</h2>
      @endif
      @if(get_sub_field('intro_paragraph'))
        <p>
          {{get_sub_field('intro_paragraph')}}
        </p>
      @endif
      @if(get_sub_field('call_to_action_link'))
          {{ get_sub_field('cta_subtext') ? $subtext = get_sub_field('cta_subtext') : $subtext = '' }}
          @php($cta = get_sub_field('call_to_action_link'))
          @include('partials.components.global-link', ['btn' => $cta, 'subtext' => $subtext])
      @endif
      </div>
      <div class="col-B">
        <div class="equation-cta-formula">
          <div class="equation-cta-equation">
            @if(get_sub_field('equation_left_side'))
              <p class="equation-body-text">
                {{get_sub_field('equation_left_side')}}
              </p>
              @endif
            @if(get_sub_field('equation_left_side_sub_text'))  
              <p class="equation-sub-text">
                {{get_sub_field('equation_left_side_sub_text')}}
              </p>
            @endif
        </div>
        @if(get_sub_field('equation_operator'))
          <div class="equation-cta-prime-operator">{{get_sub_field('equation_operator')}}</div>
        @endif
        
        <div class="equation-cta-equation">
            @if(get_sub_field('equation_right_side'))
              <p class="equation-body-text">
                {{get_sub_field('equation_right_side')}}
              </p>
              @endif
            @if(get_sub_field('equation_right_side_sub_text'))  
              <p class="equation-sub-text">
                {{get_sub_field('equation_right_side_sub_text')}}
              </p>
            @endif
        </div>
      </div>
      @if(get_sub_field('outro_wyswig'))
        <div class="equation-cta-outro-wyswig">
            {!!get_sub_field('outro_wyswig')!!}
        </div>
      @endif
    </div>
  </section>