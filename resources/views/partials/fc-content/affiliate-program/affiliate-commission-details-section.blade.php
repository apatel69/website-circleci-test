 {{--  Main Content 1&2 Wrapper  --}}
 <div class="container main-content">

{{--  Start of Main Content 1	  --}}
  <section>
  @if(get_sub_field('title')) 
    <h2>{{get_sub_field('title')}}</h2>
  @endif
  @if(get_sub_field('description'))   
    {!!get_sub_field('description')!!}
  @endif

{{--  Start of Commission Details section  --}}
  <div class="affiliates-details">
    <div class="affiliates-headline">
      @if(get_sub_field('sub_title'))
        <h3>{{get_sub_field('sub_title')}}</h3>
      @endif
    </div>
    @php($plussign = get_sub_field('plus_sign'))
    @if(have_rows('options_list')) 
      <div class="affiliates-content">
        <div class="affiliates-options">
          @while(have_rows('options_list')) @php(the_row())
            <div class="affiliates-option">
                <span class="affiliate-price-info">{{get_sub_field('earn_text')}}</span>
                <span class="affiliate-price"><sup>$</sup>{{get_sub_field('amount')}}</span>
                <span class="affiliate-price-info">{{get_sub_field('amount_sub_text')}}</span>
              <p>{{get_sub_field('option_description')}}</p>
            </div>
            @if($plussign && get_row_index()==1)
              <div class="affiliates-option">
                @include('partials.components.global-image', ['img' => $plussign])
              </div>
            @endif  
            @endwhile 
        </div>
    @endif
          @if(get_sub_field('join_us_button')) 
            @include('partials.components.global-link', ['btn' => get_sub_field('join_us_button')]) 
          @endif 
          </div>
        </div>
  {{--  End of Commission Details section  --}}
      </section>
  {{--  End of main content 1  --}}
  
  {{--  Start of Main content 2  --}}

        <section class="affiliate-cards">
          @if(get_sub_field('perks_title'))
            <h2>{{get_sub_field('perks_title')}}</h2>
          @endif
          @if(have_rows('perks_list')) 
          <div class="card-container">
            @while(have_rows('perks_list')) @php(the_row())
            <div class="card">
              <div class="single-side-card">
                <div class="color {{get_sub_field('card_color')}}"></div>
                <div class="card-content">
                  @if(get_sub_field('title'))
                  <h3>{{ get_sub_field('title') }}</h3>
                  @endif
                  @if(get_sub_field('description'))
                    {!! get_sub_field('description') !!}
                  @endif
                </div>
             </div>
            </div>
            @endwhile
         </div>
         @endif
        </section> 
      
    {{--  End of main content 2	  --}}
 </div>