<div class="container blue-background jobs-wrapper">
	<section id="available">
		<div class="one-col jobs-wrapper-info">
            @if (get_sub_field('title'))
                <h2 class="text-center">{{ get_sub_field('title') }}</h2>
            @endif
			{!! get_sub_field('content') !!}
        </div>
        
        @php($jobs = Careers::getJobs())
       
       @if (!empty($jobs))
            <div class="column-parent jobs-listing">
                @foreach ($jobs as $job)
                    <div class="job-tile">
                        <div class="job-tile-content"><h3>{{ $job['job_title'] }}</h3></div>
                        <div class="job-tile-content"><p>{{ $job['job_dept'] }}</p></div>
                        <div class="job-tile-content"><a href="{{ $job['job_url'] }}" target="_blank" rel="noopener" class="ghost-button learn-more">Learn More</a></div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no_jobs_info">
                <p class="text-center">Sorry, We dont have openings at the moment.</p>
            </div>
        @endif
        
	</section>

	<section class="notice">
        {!! get_sub_field('jobs_listing_info') !!}
	</section>
</div>