@php
    $tab_img = get_sub_field('right_tab_image');
    $tab_img_mobile = get_sub_field('right_tab_image_mobile');
    $currency_description = get_sub_field('currency_description');
    $popular_image = get_sub_field('most_popular_image');
    $promo = false;
    if (get_sub_field('promo_mode')) {
        $start = strtotime(get_sub_field('promo_duration')['start']);
        $end = strtotime(get_sub_field('promo_duration')['end']);
        $now = strtotime(date("Y-m-d H:i:s"));
        if ($now > $start && $now < $end) {
            $promo = true;
            $promo_month_icon = get_sub_field('promo_month_icon');
            $promo_year_icon = get_sub_field('promo_year_icon');
        }
    }
@endphp

<style media="screen">
  .switch-side-image::before {
    background-image: url("{{ get_sub_field('right_tab_image')['global_image']['url'] }}");
  }
</style>

<div class="container">
	<section>
        @if( have_rows('tabs') )
            <div class="subscriptions-toggle column-parent">

                @php
                    $tab_titles = [];
                @endphp

                @while( have_rows('tabs') )
                    @php
                        the_row();
                        $tab_titles[] = get_sub_field('tab_title');
                    @endphp
                @endwhile

                <div class="switch-container switch-side-image">
                    <span class="label type-one-label active">{{ $tab_titles[0] }}</span>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                    <span class="label type-two-label">{{ $tab_titles[1] }}</span>
                </div>
            </div>
        @endif
	</section>
</div>

<div class="container">
    <section>
        @if( have_rows('plans') )
            <div class="currency-disclaimer">
                Prices in USD
            </div>
            <div class="pricing-tiers">
                @while( have_rows('plans') )
                    @php
                        the_row();
                        $promo_exclusion = get_sub_field('promo_exclusion');
                    @endphp
                    <div class="pricing-tier {{ get_row_index() == 2 ? 'most-popular' : ''}}">

                        @if (get_row_index() == 2)
                            <img src="{{ $popular_image['global_image']['url'] }}" alt="" class="icon-most-popular">
                        @endif

                        <div class="plan-header">
                            @if ($promo && !$promo_exclusion && $promo_month_icon['url'])
                                <img src="{{ $promo_month_icon['url'] }}" alt="{{ $promo_month_icon['alt'] }}" class="promo-icon type-one subscription-type show-plan">
                            @endif
                            @if ($promo && !$promo_exclusion && $promo_year_icon['url'])
                                <img src="{{ $promo_year_icon['url'] }}" alt="{{ $promo_year_icon['alt'] }}" class="promo-icon type-two subscription-type">
                            @endif
                            @if (get_sub_field('plan_name'))
                                <h3 class="plan-name">{{ get_sub_field('plan_name') }}</h3>
                            @endif
                            @if (get_sub_field('description'))
                                <p class="description">{{ get_sub_field('description') }}</p>
                            @endif
                        </div>

                        <div class="plan-values">
                            @if (get_sub_field('monthly_plan_cost'))
                                @php
                                    $cost_mo = $promo && !$promo_exclusion ? get_sub_field('promo_monthly_plan_cost') : get_sub_field('monthly_plan_cost');
                                    $mo_numeric = is_numeric($cost_mo);
                                    if (strpos($cost_mo, '.')) {
                                        $cost_split = explode('.', $cost_mo);
                                        $dollars = $cost_split[0];
                                        $cents = '<sup class="cents">.' . $cost_split[1] . '</sup>';
                                    } else {
                                        $dollars = trim($cost_mo);
                                        $cents = '';
                                    }
                                @endphp
                                <div class="subscription-type type-one show-plan">
                                    <h3 class="plan-cost {{ !$mo_numeric ? 'cost-text' : '' }}">
                                        @if ($mo_numeric)
                                            <sup>$</sup>
                                        @endif
                                        {!! $dollars !!}{!! $cents !!}
                                        @if ($mo_numeric)
                                            <sub class='{{ !empty($cents) ? "with-cents" : "" }}'>/mo</sub>
                                        @endif
                                    </h3>

                                    @if ($promo)
                                        <div class="reg-cost">
                                            @if (is_numeric(get_sub_field('monthly_plan_cost')) && !$promo_exclusion)
                                                REG. <span class="strikethrough">${{ money_format("%i", get_sub_field('monthly_plan_cost')) }}</span>
                                            @else
                                                &nbsp;
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if (get_sub_field('yearly_plan_cost'))
                                @php
                                    $cost_yr = $promo && !$promo_exclusion ? get_sub_field('promo_yearly_plan_cost') : get_sub_field('yearly_plan_cost');
                                    $yr_numeric = is_numeric($cost_yr);
                                    if (strpos($cost_yr, '.')) {
                                        $cost_split = explode('.', $cost_yr);
                                        $dollars = $cost_split[0];
                                        $cents = '<sup class="cents">.' . $cost_split[1] . '</sup>';
                                    } else {
                                        $dollars = trim($cost_yr);
                                        $cents = '';
                                    }
                                @endphp
                                <div class="subscription-type type-two">
                                    <h3 class="plan-cost {{ !$yr_numeric ? 'cost-text' : '' }}">
                                        @if ($yr_numeric)
                                            <sup>$</sup>
                                        @endif
                                        {!! $dollars !!}{!! $cents !!}
                                        @if ($yr_numeric)
                                            <sub class="{{ !empty($cents) ? "with-cents" : "" }}">/mo</sub>
                                        @endif
                                    </h3>
                                    @if (get_sub_field('cost_subtext'))
                                        <small>{{ get_sub_field('cost_subtext') }}</small>
                                    @endif

                                    @if ($promo)
                                        <div class="reg-cost">
                                            @if (is_numeric(get_sub_field('yearly_plan_cost')) && !$promo_exclusion)
                                                REG. <span class="strikethrough">${{ money_format("%i", get_sub_field('yearly_plan_cost')) }}</span>
                                            @else
                                                &nbsp;
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if (get_sub_field('number_of_clients'))
                                <h4 class="plan-clients">{{ get_sub_field('number_of_clients') }} Billable Clients</h4>
                            @endif

                            @if (get_sub_field('cta'))
                                @include('partials.components.global-link', ['btn' => get_sub_field('cta'), 'classes' => 'pricing-btn'])
                            @endif

                            @if (get_sub_field('direct_buy_links'))
                                <span class="direct-buy-link">{!! get_sub_field('direct_buy_links') !!}</span>
                            @endif
                        </div>

                        <div class="plan-details">
                            {!! get_sub_field('included_features') !!}
                            <p class="show-desktop more-features">
                                + <a href="#feature-list">more</a>
                            </p>
                            <p class="show-mobile more-features">
                                <img src="@asset('images/icons/chevron-down.svg')" alt="chevron" class="mobile-expand">  <a href="#" class="show-more">Show More</a>
                            </p>
                        </div>
                    </div>
                @endwhile
            @endif
        </div>
    </section>
</div>
