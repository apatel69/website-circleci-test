<style media="screen">
	a.anchor {
		display: block;
		position: relative;
		top: -70px;
		visibility: hidden;
	}

	.sticky-overview-nav {
		background:#f7f8f9;
		overflow: hidden;
		z-index:100;
		max-width: 1280px;
	}

	.sticky-overview-nav .primary-cta {
		float: right;
		padding: 0.5em 1.3em;
		margin: 0.65em 1em 0 0;
		display:none;
	}

	.sticky-overview-nav.sticky .primary-cta{
		display:block;
	}

	.sticky-overview-nav ul{
		list-style:none;
	}

	.sticky-overview-nav li{
		background-image: none;
		float: left;
		display: block;
		text-align: center;
		padding: 0.5em 2em 0 2em;
	}

	.sticky-overview-nav li a {
		text-decoration: none;
		color: black;
	}

	.sticky-overview-nav .active {
		border-bottom: 6px solid #0C83DD;
		padding-bottom: 3px;
	}

	.sticky {
		position: fixed;
		top: 0;
		width: 100%;
	}

	.nudge {
		padding-top: 90px;
	}

    .sticky-nav-hidden {
        display: none;
    }
</style>

<div class="sticky-overview-nav sticky-nav-hidden">
    <ul>
      <li><a class="sticky-nav-link active" href="#section3">Overview</a></li>
      <li><a class="sticky-nav-link" href="#section5">Features</a></li>
      <li><a class="sticky-nav-link" href="#customer-testimonials">Testimonials</a></li>
      <li><a class="sticky-nav-link" href="#section8">Who's It For?</a></li>
    </ul>
    <a id="sticky-cta" class="primary-cta" href=”javascript:;” target="_blank">Try It Free</a>
</div>
