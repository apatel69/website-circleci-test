<div class="copy-content">
    <h1>{{ get_field('alternative_title') ?  get_field('alternative_title') : get_the_title() }}</h1>
    {!! get_the_content() !!}
</div>