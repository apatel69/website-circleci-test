@php
$press_release_url = get_field('press_release_url') ? get_field('press_release_url') : 'https://www.freshbooks.com';
@endphp
<section class="introduction" id="introduction">
    <div class="arContainer">
        <div class="introduction__contentWrapper">
            <div class="introduction__column introduction__column1">
                <div class="introduction__box1">
                        <h2 class="introduction__title slide-right">Introduction</h2>
                        <p>As we first reported in 2018, large numbers of American workers are thinking about abandoning their full-time
                            jobs in favor of self-employment. In our Third Annual Self-Employment Report, we estimate this number
                            to be a staggering 24 million people. Such a shift, if realized will be profoundly consequential to the
                            economy.</p>
                </div>
                <div class="introduction__box2">
                    <p>And yet, this year’s study also finds that only a fraction of these would-be small business owners have
                        recently taken the plunge. Why the discrepancy?</p>
                    <p>Our third annual study digs deep into survey data from nearly 4,000 American workers to answer this and
                        many other key questions regarding the self-employed economy. To review a summary of key findings
                        from the report,
                        <a href="{{$press_release_url}}" target="_blank">see our press release</a>.</p>
                    <p>What are the primary motivations that propel people to become their own boss and what sorts of barriers
                        sometimes get in the way? Where will the next generation of entrepreneurs come from and how are they
                        planning for success? How are newly self-employed professionals working differently, and to what
                        extent are they leveraging digital tools and platforms to do so? What are their expectations, not
                        just from a career but also a quality of life perspective, and how do these line up with the experiences
                        of veteran small business owners?</p>
                    <p>Something else we’ve learned along the way: while self-employed professionals and small business owners
                        have much in common, there is also incredible diversity within this group.</p>
                </div>


            </div>
            <div class="introduction__column introduction__column2">
                <div class="introduction__infographic">
                    <img src="@asset('images/annual-report/introduction/map.svg')" alt="">
                </div>
                <div class="introduction__column--inner">
                    <div class="u-hidden-desktop">
                        <p>And yet, this year’s study also finds that only a fraction of these would-be small business owners
                            have recently taken the plunge. Why the discrepancy?</p>
                        <p>Our third annual study digs deep into survey data from nearly 4,000 American workers to answer this
                            and many other key questions regarding the self-employed economy. To review a summary of key
                            findings from the report,
                            <a href="{{$press_release_url}}" target="_blank">see our press release</a>.</p>
                        <p>What are the primary motivations that propel people to become their own boss and what sorts of barriers
                            sometimes get in the way? Where will the next generation of entrepreneurs come from and how are
                            they planning for success? How are newly self-employed professionals working differently, and
                            to what extent are they leveraging digital tools and platforms to do so? What are their expectations,
                            not just from a career but also a quality of life perspective, and how do these line up with
                            the experiences of veteran small business owners?</p>
                        <p>Something else we’ve learned along the way: while self-employed professionals and small business
                            owners have much in common, there is also incredible diversity within this group.</p>
                    </div>
                    <p>Some have embarked on their career independence journey via baby steps, while others have made wholesale
                        changes to how they earn a living. Many are laser-focused in their professional service or small
                        business offerings, while others thrive by juggling multiple unrelated small business enterprises.
                        This report identifies what we believe are the most interesting and important emerging self-employment
                        archetypes.</p>
                    <p>To start, let’s take a closer look at how the world of self-employment and small business ownership has
                        evolved over the past few years.</p>
                </div>
            </div>
        </div>
    </div>
</section>