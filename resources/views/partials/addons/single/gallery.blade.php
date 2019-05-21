@php
    $images = get_field('image_gallery');
    $thumbnails = get_field('image_gallery_thumbnails');
@endphp
<section class="addons-screenshots">
	@if ($images)
		<div class="screenshots tile">
            <div class="screenshot-frame" id="screenshot-frame">
                @foreach( $images as $image )
                    <img src="{{ $image['sizes']['large'] }}" alt="{{ $image['alt'] }}" />
                @endforeach
            </div>
			<div class="thumbnails">
                @foreach( $thumbnails as $thumb )
                    <div class="thumb">
                        <img src="{{ $thumb['sizes']['large'] }}" alt="{{ $thumb['alt'] }}" />
                    </div>
                @endforeach
			</div>
		</div>
	@endif
</section>