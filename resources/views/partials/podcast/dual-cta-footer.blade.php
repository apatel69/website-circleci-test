<div class="container dual-cta-footer-podcast">
	<section>
        <div class="col">
            <h3>{!! $data['left']['header'] !!}</h3>
            <p>{!! $data['left']['body'] !!}</p>
            @if ($data['left']['cta'])
                @include ('partials.components.global-link', ['btn' => $data['left']['cta'], 'classes' => ''])
            @endif
        </div>
        <div class="col">
            <h3>{!! $data['right']['header'] !!}</h3>
            <p>{!! $data['right']['body'] !!}</p>
            @if ($data['right']['cta'])
                @include ('partials.components.global-link', ['btn' => $data['right']['cta'], 'classes' => ''])
            @endif
        </div>
    </section>
</div>
