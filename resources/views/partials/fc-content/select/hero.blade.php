@if (get_sub_field('include_chart'))
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"/></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"/></script>
@endif

<section id="section{{$counter}}">

    <div class="container hero-modular {{ get_sub_field('include_chart') ? '' : 'hero-simple'}}">

        <div class="hero" style="background-image: url({{ get_sub_field('background_image')['global_image']['url'] }})">
            <div class="chart-container">
                <canvas id="bgChart" class="desktop-chart" width="400" height="400"></canvas>
                <img id="mobileChart" class="mobile-chart" src='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="319.88" height="126.34"><path fill="%23fff" d="M319.88 16.02L0 81.24v45.1h319.88z"/><path fill="%23fdf4e4" d="M319.88 0L0 38.01v88.33l319.88-98.39z"/></svg>'>
            </div>

            <div class="row">
                <div class="col-2">
                    <h1 class="header">{{ get_sub_field('header') }}</h1>
                    <p class="description">{{ get_sub_field('description') }}</p>
                </div>
                <div class="col-2">

                </div>
            </div>
        </div>

        <div class="hero-additional row">
            @if (get_sub_field('include_quote'))
                @include('partials.fc-content.select.block-quote')
            @endif
            @if (get_sub_field('include_form'))
                @include('partials.fc-content.select.form')
            @endif
        </div>

    </div>

    @if (get_sub_field('include_chart'))
        <script type="text/javascript">

        var x = window.matchMedia("screen and (min-device-width: 481px) and (orientation: portrait)");
        var y = window.matchMedia("screen and (orientation: landscape)");

        if (x.matches || y.matches) {
            doChart();
        }

        function doChart() {

            var ctx = document.getElementById("bgChart").getContext('2d');

            const colours = {
                primary: {
                    fill: '#FDF4E4',
                    stroke: '#FDF4E4',
                    point: '#257801',
                    pStroke: '#fbfdfe'
                },
                secondary: {
                    fill: '#ffffff',
                    stroke:'ffffff',
                },
            };

            const labels = [];
            const primary = [];
            const secondary = [];
            const dashed = [];
            const points = [];

            // Populate values with wp-admin entries, or defaults
            @if(get_sub_field('chart_values_primary'))
                @foreach (get_sub_field('chart_values_primary') as $primary)
                    primary.push({{ $primary['value'] }});
                    labels.push("{{ $primary['label'] }}");
                @endforeach
            @else
                primary = [15, 25, 75, 87.5, 155, 175];
                labels = ["", "$500,000", "$730,000", "$875,000", "$1,025,000", ""];
            @endif

            @if(get_sub_field('chart_values_secondary'))
                @foreach (get_sub_field('chart_values_secondary') as $secondary)
                    secondary.push({{ $secondary['value'] }});
                @endforeach
            @else
                secondary = [0, 5, 60, 70, 130, 135];
            @endif

            // Remove first and last points from showing
            primary.forEach(function (p, i) {
                i == 0 || i == (primary.length - 1) ? points.push(0) : points.push(5);
            });

            // Create dashed bar values
            primary.forEach(function (q, j) {
                j == 0 || j == (primary.length - 1) ? dashed.push(0) : dashed.push(q + 25);
            })

            // Chart
            var bgChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            fill: true,
                            backgroundColor: colours.secondary.fill,
                            borderColor: colours.secondary.stroke,
                            pointBorderColor: colours.primary.pStroke,
                            pointBackgroundColor: colours.primary.point,
                            pointRadius: 0,
                            pointBorderWidth: 0,
                            data: secondary,
                            datalabels: {
                                display: false
                            },
                            xAxisID: 'secondary-x'
                        },
                        {
                            fill: true,
                            backgroundColor: colours.primary.fill,
                            borderColor: colours.primary.stroke,
                            pointBorderColor: colours.primary.pStroke,
                            pointBackgroundColor: colours.primary.point,
                            pointRadius: points,
                            pointBorderWidth: 2,
                            data: primary,
                            datalabels: {
                                align: 'end',
                                anchor: 'end',
                                offset: 35,
                                color: '#ffffff',
                                formatter: function(value, context) {
                                    return context.chart.data.labels[context.dataIndex];
                                }
                            },
                            xAxisID: 'primary-x'
                        },
                        {
                            type: 'bar',
                            data: dashed,
                            borderWidth: 1,
                            borderColor: '#ffffff',
                            datalabels: {
                                display: false
                            },
                            xAxisID: 'dashed-x'
                        }
                    ]
                },
                options: {
                    layout: {
                        padding: {
                            top: 50
                        }
                    },
                    scales: {
                        xAxes: [
                            {
                                id: 'secondary-x',
                                display: false
                            },
                            {
                                id: 'primary-x',
                                display: false
                            },
                            {
                                id: 'dashed-x',
                                display: false,
                                barThickness: 1
                            }
                        ],
                        yAxes: [{
                            display: false
                        }]
                    },
                    legend: {
                        display: false
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    elements: {
                        line: {
                            tension: 0
                        },
                        rectangle: {
                            borderSkipped: 'right'
                        }
                    }
                }
            });

            // Modify bar chart layer to have dashed outlines
            Chart.helpers.each(bgChart.getDatasetMeta(2).data, function (rectangle, index) {
                rectangle.draw = function () {
                    bgChart.chart.ctx.setLineDash([5, 5]);
                    Chart.elements.Rectangle.prototype.draw.apply(this, arguments);
                }
            }, null);

        }
        </script>
    @endif
</section>
