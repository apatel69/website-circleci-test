<div class='hero-background'>
    <section class='hero'>
        <div class="wrapper">
            @php(wp_nonce_field( 'business_name_generator', 'business_name_generator_nonce' ))
            <!-- Start of the Business Name Generator - start -->
            <div class="bng-start" id="bng-start">
                @if (get_field('title'))
                    <h1 class='business-name-hero-title'>{{ get_field('title') }}</h1>
                @endif
                @if (get_field('subtitle'))
                    <p class='business-name-hero-subtitle'>{{ get_field('subtitle') }}</p>
                @endif
                @if (get_field('start_button_text'))
                    <button id='get-started' class='button-primary business-name-generator-button'>{{ get_field('start_button_text') }}</button>
                @endif
            </div>
            <!-- Start of the Business Name Generator - end -->
            <!-- Select your industry - start -->
            <div class="bng-select-industry hidden-step" id="bng-select-industry">
                @if (get_field('industry_title'))
                    <h1 class='business-name-hero-title'>{{ get_field('industry_title') }}</h1>
                @endif
                @if (get_field('industry_subtitle'))
                    <p class='business-name-hero-subtitle'>{{ get_field('industry_subtitle') }}</p>
                @endif
                <div class="vertical-options">
                    <div class="four-industry">
                        <button href="" class="industry" id="creatives">
                            <div class="vertical-icon">
                                <span class="vertical-creatives">
                                    @include('partials.business-name-generator.inline-svgs.creatives')
                                </span>
                            </div>
                            @if (get_field('creatives_label'))
                                <h2 class='industry-name'>{!! get_field('creatives_label') !!}</h2>
                            @endif
                        </button>
                        <button href="" class="industry" id="legal">
                            <div class="vertical-icon">
                                <span class="vertical-legal">
                                    @include('partials.business-name-generator.inline-svgs.legal')
                                </span>
                            </div>
                            @if (get_field('legal_label'))
                                <h2 class='industry-name'>{!! get_field('legal_label') !!}</h2>
                            @endif
                        </button>
                        <button href="" class="industry" id="trades">
                            <div class="vertical-icon">
                                <span class="vertical-trades">
                                    @include('partials.business-name-generator.inline-svgs.trades')
                                </span>
                            </div>
                            @if (get_field('trades_label'))
                                <h2 class='industry-name'>{!! get_field('trades_label') !!}</h2>
                            @endif
                        </button>
                        <button href="" class="industry" id="it">
                            <div class="vertical-icon">
                                <span class="vertical-it">
                                    @include('partials.business-name-generator.inline-svgs.it')
                                </span>
                            </div>
                            @if (get_field('it_label'))
                                <h2 class='industry-name'>{!! get_field('it_label') !!}</h2>
                            @endif
                        </button>
                    </div>
                </div>
            </div>
            <!-- Select your industry - end -->
            <!-- Keyword - start -->
            <div class="bng-keyword hidden-step" id="bng-keyword">
                @if (get_field('key_word_title'))
                    <h1 class="business-name-hero-title">{{ get_field('key_word_title') }}</h1>
                @endif
                @if (get_field('key_word_subtitle'))
                    <p class="business-name-hero-subtitle">{!! get_field('key_word_subtitle') !!}</p>
                @endif
                <form action="#" class="keyword-form">
                    <input type="text" class="form-input keyword-input" placeholder="{{ get_field('key_word_placeholder') }}">
                    @if (get_field('submit_button_text'))
                        <button id="keyword-submit" class="button-primary keyword-submit">
                            <span class="button-primary-text">{{ get_field('submit_button_text') }}</span>
                        </button>
                    @endif
                </form>
            </div>
            <!-- Keyword - end -->
            <!-- Options - start -->
            <div class="bng-options hidden-step" id="bng-options">
                @if (get_field('options_title'))
                    <h1 class="business-name-hero-title">{{ get_field('options_title') }}</h1>
                @endif
                @if (get_field('options_subtitle'))
                    <p class="business-name-hero-subtitle">{{ get_field('options_subtitle') }}</p>
                @endif
                <div id="options-container" class="return-options"></div>
                @if (get_field('see_more_label') && get_field('change_key_word_text'))
                    <p class="regenerate-word"><a class="hero-paragraph-link" id="see-more" href="">{{ get_field('see_more_label') }}</a>, or <a class="hero-paragraph-link" id="select-new-word" href="">{{ get_field('change_key_word_text') }}</a></p>
                @endif
                @if (get_field('option_image'))
                    @include('partials.components.global-image', ['img' => get_field('option_image'), 'classes' => 'magic-wand hidden-wand animated fadeIn'])
                @endif
            </div>
            <!-- Options - end -->
            <!-- Result - start -->
            <div class="bng-result hidden-step" id="bng-result">
                @if (get_field('lead_off_text'))
                    <p class="business-name-hero-subtitle business-name-lead-off">{{ get_field('lead_off_text') }}</p>
                @endif
                <div class="name-container">
                    <div class="lights-top lights-row"></div>
                    <div class="center-content">
                        <div class="lights-left cell lights-col"></div>
                        <div class="business-name-result name cell"></div>
                        <div class="lights-right cell lights-col"></div>
                    </div>
                    <div class="lights-bottom lights-row"></div>
                </div>
                @if (get_field('cta_text'))
                    <p class="business-name-hero-subtitle blog-lead-in">{{ get_field('cta_text') }}</p>
                @endif
                @if (get_field('results_cta'))
                    @include ('partials.components.global-link', ['btn' => get_field('results_cta'), 'classes' => 'blog-lead-in button-primary business-name-generator-button'])
                @endif
                @if (get_field('results_image_left'))
                    @include('partials.components.global-image', ['img' => get_field('results_image_left'), 'classes' => 'building-left'])
                @endif
                @if (get_field('results_image_right'))
                    @include('partials.components.global-image', ['img' => get_field('results_image_right'), 'classes' => 'building-right'])
                @endif
                @if (get_field('results_image'))
                    @include('partials.components.global-image', ['img' => get_field('results_image'), 'classes' => 'look-sign'])
                @endif
            </div>
            <!-- Result - end -->
        </div>
    </section>
</div>