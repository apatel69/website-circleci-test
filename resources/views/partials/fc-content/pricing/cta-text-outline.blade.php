<div class="container">
	<section>
		<div class="hvc-details">
            @if (get_sub_field('title'))
			    <h3><strong>{{ get_sub_field('title') }}</strong></h3>
            @endif
			{!! get_sub_field('subtext') !!}
		</div>
	</section>
</div>