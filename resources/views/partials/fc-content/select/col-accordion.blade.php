@php
    $data = get_sub_field('info_accordion');
@endphp
<div id="" class="select-col-accordion">
    @foreach ($data as $row)
        <div class="item">
            <h3 class="question">{{ $row['question'] }}</h3>
            <div class="answer">
                <p>{!! $row['answer'] !!}</p>
            </div>
        </div>
    @endforeach
</div>

<script type="text/javascript">
    window.onload = function() {
        jQuery('.select-col-accordion').find('.question').click(function() {
            jQuery(this).parent().find('.answer').children().slideToggle(400);
            jQuery(this).toggleClass('expanded');
        });
    };
</script>
