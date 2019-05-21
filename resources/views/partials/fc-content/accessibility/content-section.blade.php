@if (get_sub_field('content'))
    <div class="container">
        <div class="one-col">
            <section>
                {!! get_sub_field('content') !!}
            </section>
        </div>
    </div>
@endif