@php
   //This is from the groupled clone "Global - Video Embed Two Column Feature"
   $acfFieldData = get_sub_field('video_feature_cta') ?: get_field('video_feature_cta');
   $ctaTitle = $acfFieldData['video_embed_two_column_title'];
   $ctaId = preg_replace("/[^a-zA-Z]+/", "", $ctaTitle);
   $ctaSubtTitle = $acfFieldData['video_embed_two_column_sub_title'];
   $videoSource = $acfFieldData['embed_video'] ? $acfFieldData['video_source'] : FALSE;
   $featureImage = !$videoSource ? $acfFieldData['feature_image']['global_image'] : FALSE;
   $videoDescription = $acfFieldData['video_embed_two_column_description'];
   $ctaLink = $acfFieldData['video_embed_two_column_description_cta_link'];
   $featureImage = $acfFieldData['feature_image'];
   $flipped = $acfFieldData['flip_text'] ? 'flipped' : '';
   $headingWeight = get_sub_field('heading_weight') ? get_sub_field('heading_weight') : 'h2';
@endphp

@if (get_sub_field('two_column_video_feature_background_image'))
   @include('partials.components.global-image', ['img' => get_sub_field('two_column_video_feature_background_image'), 'is_background_image' => true, 'background_element_id' => $ctaId  ])
@endif

<div id="{{$ctaId}}" class="two-column-video-feature-container {{ $flipped }} container">

   @if ($ctaTitle !== "")
      <{{$headingWeight}} class="two-column-video-feature-cta-title">{{$ctaTitle}}</{{$headingWeight}}>
   @endif

   @if ($acfFieldData['flip_text'])
      <div class="two-column-video-feature-description">
         <h3>{{ $ctaSubtTitle }}</h3>
         {!! $videoDescription !!}
         @if ($ctaLink)
            @include('partials.components.global-link', ['btn' => $ctaLink])
         @endif
      </div>
   @endif

   @if ($videoSource !== FALSE)
      <div class="two-column-video-feature-video">
         <div class="responsive-video">
            {!! $videoSource !!}
         </div>
      </div>
   @else
      <div class="two-column-video-feature-image">
         @if ($featureImage)
            @include('partials.components.global-image', ['img' => $featureImage])
         @endif
      </div>
   @endif

   @if (!$acfFieldData['flip_text'])
      <div class="two-column-video-feature-description">
         <h3>{{ $ctaSubtTitle }}</h3>
         {!! $videoDescription !!}
         @if ($ctaLink)
            @include('partials.components.global-link', ['btn' => $ctaLink])
         @endif
      </div>
   @endif

</div>
