@php
    $section = isset($count) ? 'section' . $count : '';
@endphp

<div id="{{ $section }}" class="container two-col-small-image">
	<section>
		<div class="row">
            <div class="col image">
                <div class="image-container">
                    @include('partials.components.global-image', ['img' => get_sub_field('image'), 'classes' => ''])
                </div>
            </div>
            <div class="col content">
                @if(get_sub_field('title'))
                    <h3>{{ get_sub_field('title') }}</h3>
                @endif
                @if(get_sub_field('body'))
                    {!! get_sub_field('body') !!}
                @endif
                @if(get_sub_field('cta'))
                    @include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'btn-ghost'])
                @endif
            </div>
        </div>
	</section>
</div>
