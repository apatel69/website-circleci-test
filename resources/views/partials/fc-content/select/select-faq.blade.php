<div class="container">
  <section class="faq-container no-side-pad-tablet ">
    @if(get_sub_field('faq_accordion'))
      <h2>{{get_sub_field('faq_accordion') ["global_faq_section_title"]}}</h2>
    @endif
    @php
    $faq = get_sub_field('faq_accordion')["global_faqs"];
    
    $faq_count = count($faq);

    $column_count = 2;

    $array1 = array_slice($faq, 0, ceil($faq_count/$column_count));

    $array2 = array_slice($faq, ceil($faq_count/$column_count), $faq_count);

    $faq_array = array_map(null, $array1, $array2);
    
    @endphp
    @if(!empty($faq))
      <div class="column-parent faq-columns">
        @foreach($faq_array as $faq_split)
          <div class="faq-column">
            @foreach($faq_split as $faq_list)
              <div class="faq-item">
                @if($faq_list["global_faq_question"])
                  <h3 class="faq-question">{{$faq_list["global_faq_question"]}}</h3>
                @endif
                <div class="faq-answer">
                  {!!$faq_list["global_faq_answer"]!!}
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    @endif
    </section>
  </div>