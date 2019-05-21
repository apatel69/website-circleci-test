@php
  $custom_content = get_sub_field('featured_in')['featured_logos'];
  $title = $custom_content ? get_sub_field('featured_in')['featured_label'] : get_field('featured_in_label', 'option');

  $custom_toggle = get_sub_field('custom_content');
  if ($custom_toggle && get_sub_field('featured_logos')) {
      $custom_content = get_sub_field('featured_logos');
      $title = get_sub_field('featured_label');
  }
@endphp

<div class="featured-in container">
    <section>
        <span class="copy">{{ $title }}</span>
        @if (!$custom_content)
            @while( have_rows('featured_in_logos', 'option'))
                @php(the_row())
                @php($img = get_sub_field('logo'))
                @php($logo_custom_class = get_sub_field('featured_in_logo_custom_class'))
                @php($display = get_sub_field('featured_logo_display'))
                @include('partials.components.global-image', ['img' => $img, 'classes' => 'logo ' . 'hide-' . $display . ' ' . $logo_custom_class])
            @endwhile
        @else
            @foreach ($custom_content as $key => $value)
                @php($img = $value['logo'])
                @php($logo_custom_class = isset($value['featured_in_logo_custom_class']) ? $value['featured_in_logo_custom_class'] : '')
                @php($display = $value['featured_logo_display'])
                @include('partials.components.global-image', ['img' => $img, 'classes' => 'logo hide-' . $display . ' ' . $logo_custom_class])
            @endforeach
        @endif
    </section>
</div>
