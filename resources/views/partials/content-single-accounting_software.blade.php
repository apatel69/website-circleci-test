<div class="rule"></div>

@if (get_field('getapp'))
    @include('partials/fc-content/global/getapp')
@endif

@if (get_field('main_content_with_image'))
    <div class="container main-content">
        <section id="cpy-main-content">
            @php ($main_content_with_image = get_field('main_content_with_image'))
            @if ($main_content_with_image['title'])
                <h2>{{ $main_content_with_image['title'] }}</h2>
            @endif
            @if ($main_content_with_image['main_content'])
                {!! $main_content_with_image['main_content'] !!}
            @endif
            @if ($main_content_with_image['image'])
                @include('partials.components.global-image', ['img' => $main_content_with_image['image']])
            @endif
        </section>
    </div>
@endif

@if (have_rows('three_column_image_content'))
    <div class="container">
        <section>
            <div class="column-parent thirds">
                @while (have_rows('three_column_image_content')) @php(the_row())
                    <div class="third">
                        @if (get_sub_field('image'))
                            @php ($image = get_sub_field('image'))
                            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                        @endif
                        @if (get_sub_field('heading'))
                            <h3>{{ get_sub_field('heading') }}</h3>
                        @endif
                        @if (get_sub_field('content'))
                            <p>{{ get_sub_field('content') }}</p>
                        @endif
                    </div>
                @endwhile
            </div>
        </section>
    </div>
@endif

@if (get_field('content_image_cta'))
    <div class="container main-content">
        <section id="cpy-main-content">
            @php($content_image_cta = get_field('content_image_cta'))
            @if ($content_image_cta['title'])
                <h2>{{ $content_image_cta['title'] }}</h2>
            @endif
            @if ($content_image_cta['content'])
                <p>{!! $content_image_cta['content'] !!}</p>
            @endif
            @if ($content_image_cta['cta'])
                @include('partials.components.global-link', ['btn' => $content_image_cta['cta'], 'classes' => 'extra-padding'])
            @endif
            @if ($content_image_cta['image'])
                @include('partials.components.global-image', ['img' => $content_image_cta['image']])
            @endif
        </section>
    </div>
@endif

@if (have_rows('four_column_content'))
    <div class="container">
        <section>
            <div class="quarters column-parent">
                @while (have_rows('four_column_content')) @php(the_row())
                    <div class="quarter">
                        @if (get_sub_field('title'))
                            <h3>{{ get_sub_field('title') }}</h3>
                        @endif
                        @if (get_sub_field('content'))
                            <p>{!! get_sub_field('content') !!}</p>
                        @endif
                    </div>
                @endwhile
            </div>
        </section>
    </div>
@endif

@if (get_field('two_column_image_content'))
    <div class="container">
        <section>
            @php ($two_column_image_content = get_field('two_column_image_content'))
            <div class="row-contents column-parent">
                <div class="row-content">
                    @if ($two_column_image_content['title'])
                        <h2>{{ $two_column_image_content['title'] }}</h2>
                    @endif
                    @if ($two_column_image_content['content'])
                        <p>{!! $two_column_image_content['content'] !!}</p>
                    @endif
                </div>
                <div class="row-content">
                    @if ($two_column_image_content['image'])
                        @include('partials.components.global-image', ['img' => $two_column_image_content['image']])
                    @endif
                </div>
            </div>
        </section>
    </div>
@endif

@if (have_rows('two_column_content_with_image'))
    <div class="container">
        <section>
            <div class="halves column-parent">
                @while (have_rows('two_column_content_with_image')) @php(the_row())
                    <div class="half">
                        @if (get_sub_field('column_title'))
                            <h2>{{ get_sub_field('column_title') }}</h2>
                        @endif
                        @if (get_sub_field('column_content'))
                            <p>{!! get_sub_field('column_content') !!}</p>
                        @endif
                        @if (get_sub_field('column_image'))
                            @include('partials.components.global-image', ['img' => get_sub_field('column_image')])
                        @endif
                    </div>
                @endwhile
            </div>
        </section>
    </div>
@endif

@include('partials.accounting-software.awards')

@if (get_field('two_column_image_cta'))
    <div class="container">
        <section id="cpy-row-content-img">
            <div class="row-contents column-parent">
                <div class="row-content">
                    @php($two_col_image_cta = get_field('two_column_image_cta'))
                    @if ($two_col_image_cta['title'])
                        <h2>{{ $two_col_image_cta['title'] }}</h2>
                    @endif
                    @if ($two_col_image_cta['content'])
                        <p>{!! $two_col_image_cta['content'] !!}</p>
                    @endif
                    @if ($two_col_image_cta['cta'])
                        @include('partials.components.global-link', ['btn' => $two_col_image_cta['cta'], 'classes' => 'extra-padding'])
                    @endif
                </div>
                <div class="row-content">
                    @if ($two_col_image_cta['image'])
                        @include('partials.components.global-image', ['img' => $two_col_image_cta['image']])
                    @endif
                </div>
            </div>
        </section>
    </div>
@endif

@if (have_rows('two_column_content_with_image_two'))
    <div class="container">
        <section>
            <div class="halves column-parent">
                @while(have_rows('two_column_content_with_image_two')) @php(the_row())
                    <div class="half">
                        @if (get_sub_field('column_title'))
                            <h2>{{ get_sub_field('column_title') }}</h2>
                        @endif
                        @if (get_sub_field('column_content'))
                            <p>{!! get_sub_field('column_content') !!}</p>
                        @endif
                        @if (get_sub_field('column_image'))
                            @include('partials.components.global-image', ['img' => get_sub_field('column_image')])
                        @endif
                    </div>
                @endwhile
            </div>
        </section>
    </div>
@endif

@if (get_field('two_column_image_content_two'))
    <div class="container">
        <section id="cpy-row-content-img">
            <div class="row-contents column-parent">
                <div class="row-content">
                    @php($two_col_image_cta_two = get_field('two_column_image_content_two'))
                    @if ($two_col_image_cta_two['title'])
                        <h2>{{ $two_col_image_cta_two['title'] }}</h2>
                    @endif
                    @if ($two_col_image_cta_two['content'])
                        <p>{!! $two_col_image_cta_two['content'] !!}</p>
                    @endif
                </div>
                <div class="row-content">
                    @if ($two_col_image_cta_two['image'])
                        @include('partials.components.global-image', ['img' => $two_col_image_cta_two['image']])
                    @endif
                </div>
            </div>
        </section>
    </div>
@endif

@if (have_rows('four_column_rows'))
    <div class="container">
        <section>
            <div class="column-parent sevenths">
                @while(have_rows('four_column_rows')) @php(the_row())
                    <div class="seventh">
                        @if (get_sub_field('title'))
                            <h3>{{ get_sub_field('title') }}</h3>
                        @endif
                        @if (get_sub_field('content'))
                            <p>{!! get_sub_field('content') !!}</p>
                        @endif
                    </div>
                @endwhile
            </div>
        </section>
    </div>
@endif

@if (get_field('two_column_image_content_two_three'))
    <div class="container">
        <section class="addons column-parent" id="cpy-addons">
            <div class="two-col-parent-col content">
                @php($two_column_image_content_two_three = get_field('two_column_image_content_two_three'))
                @if ($two_column_image_content_two_three['title'])
                    <h2>{{ $two_column_image_content_two_three['title'] }}</h2>
                @endif
                @if ($two_column_image_content_two_three['content'])
                    <p>{{ $two_column_image_content_two_three['content'] }} </p>
                @endif
            </div>
            @if ($two_column_image_content_two_three['image'])
                <div class="two-col-parent-col addons-img">
                    @include('partials.components.global-image', ['img' => $two_column_image_content_two_three['image']])
                </div>
            @endif
        </section>
    </div>
@endif

@if (get_field('faq'))
    @include('partials.fc-content.global.faq-accordion')
@endif
