@extends('layouts.app')

@section('content')

<div class="container">
  <section class="404-wrapper ">
      <div class="four-oh-four-copy">
        {!! get_field('404_content', 'option') !!}
      </div>
      <div class="four-oh-four-image">
        <a href="{{ get_field('404_image_link', 'option') ? get_field('404_image_link', 'option') : 'javascript:;' }}" target="_blank" rel="noreferer">
          @if (get_field('404_image', 'option'))
            @include('partials.components.global-image', ['img' => get_field('404_image', 'option') ])
          @endif
        </a>
      </div>
      <div class="clear-both"></div>
		  <div id="st-results-container"></div>
    </section>
</div>

@endsection
