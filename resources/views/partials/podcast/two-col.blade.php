@php
    $anchorID = $data['anchor_id'] ?: '';
@endphp
<div id="{{$anchorID}}" class="container two-col-podcast">
	<section>
        <div class="col">
            @include('partials.components.global-image', ['img' => $data['column_image']])
        </div>
        <div class="col">
            {!! $data['column_content'] !!}
        </div>
    </section>
</div>
