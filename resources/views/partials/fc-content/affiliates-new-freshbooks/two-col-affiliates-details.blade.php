<div class="container">
  <section>
    <div class="affiliates-info">
      @if(have_rows('affiliates_heading_list'))
      <div class="affiliates-heading column-parent">
        @while(have_rows('affiliates_heading_list')) @php(the_row())
        <div class="affiliate-heading">
          @if(get_sub_field('affiliates_heading_image'))
            @include('partials.components.global-image', ['img' => get_sub_field('affiliates_heading_image')])  
          @endif
          @if(get_sub_field('affiliates_heading_title'))
            <h2>{{get_sub_field('affiliates_heading_title')}}</h2>
          @endif
        </div>
        @endwhile
      </div>
      @endif
      @php($plusImage =get_sub_field('plus_image'))
      @if(have_rows('affiliates_details_list'))
      <div class="affiliate-details column-parent">
        @while(have_rows('affiliates_details_list')) @php(the_row())
        <div class="affiliate-detail">
          @if(get_sub_field('earn_text'))
            <span>{{get_sub_field('earn_text')}}</span>
          @endif
          @if(get_sub_field('amount'))
            <h3><sup>$</sup>{{get_sub_field('amount')}}</h3>
          @endif
          @if(get_sub_field('amount_sub_text'))
            <span class="affiliate-how-much">{{get_sub_field('amount_sub_text')}}</span>
          @endif
          {!!get_sub_field('description')!!}
        </div>
        @if($plusImage && get_row_index()==1)
          <div class="affiliate-plus">
            @include('partials.components.global-image', ['img' => $plusImage])
          </div>
        @endif
        @endwhile
        
      </div>
      @endif
    </div>
    </section>
  </div>
  