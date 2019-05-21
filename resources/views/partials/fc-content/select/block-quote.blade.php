<div class="select-block-quote">
    <div class="row">
        <div class="text-col">
            <h4>{{ get_sub_field('quote')['header'] }}</h4>
            <i>{{ get_sub_field('quote')['body'] }}</i>
        </div>
        <div class="author-col">
            <div class="box">
                <img src="{{ get_sub_field('quote')['photo']['url'] }}" alt="author-photo">
            </div>
            <div class="author">
                <div class="author-name">{{ get_sub_field('quote')['name'] }}</div>
                <div class="author-position">{{ get_sub_field('quote')['position'] }}</div>
                <div class="author-company">{{ get_sub_field('quote')['company'] }}</div>
            </div>
        </div>
    </div>
</div>
