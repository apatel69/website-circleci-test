@php
$ctaTitle = get_sub_field('cta_title');
$ctaId = preg_replace("/[^a-zA-Z]+/", "", $ctaTitle);
$columns = get_field('invoice_templates')['invoice_columns'];
@endphp
@if (get_field('invoice_templates')['invoice_columns'])
<div class="container">
  <section>
    <div class="two-col">
      @foreach ($columns as $column)
        <div class="col">
          <div class="col-image-container">
          @include('partials.components.global-image', ['img' => $column['column_image']])
          </div>
          <h4>{{$column['column_title']}}</h4>
          <p>{{$column['column_description']}}</p>
          @include('partials.components.global-link', ['btn' => $column['column_link'], 'classes' => 'text-link'])
        </div>
      @endforeach
    </div>
  </section>
</div>
@endif


