@php
    $next_arrow = App\asset_path('images/icons/btn-next.svg');
    $previous_arrow = App\asset_path('images/icons/btn-prev.svg');
    $total_pages = $posts->max_num_pages;
@endphp

@if ($total_pages > 1)
    @php 
        $current_page = max(1, get_query_var('paged'));
        $pagination_arr = paginate_links(array(
            'mid_size'  => 3,
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('<span class="prev page-numbers"><img class="pagination-btn" src="' . $previous_arrow . '" alt="previous"></span>'),
            'next_text'    => __('<span class="next page-numbers"><img class="pagination-btn" src="' . $next_arrow . '" alt="next"></span>'),
            'type'      => 'array'
        ));

        $arr_length = count($pagination_arr);

        $formatted_pagination = $pagination_arr;

        if($arr_length > 7) {
            $formatted_pagination = array_slice($formatted_pagination,($arr_length - 7));

            if ($current_page !== 1) {
                $prev = reset($pagination_arr);
                array_unshift($formatted_pagination, $prev);
            }
        }
    @endphp

    <div class="pagination-container">
        {!! implode(" ", $formatted_pagination) !!}
    </div>
@endif