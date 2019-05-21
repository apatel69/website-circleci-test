<div class="dev-content-wrap toggle-active">
    @if (have_rows('curl_snippets') || have_rows('python_snippets') || have_rows('php_snippets'))
        <div class="lang-toggle">
            @if (have_rows('curl_snippets'))
                <a href="#" data-target="curl" class="btn-api active">curl</a>
            @endif
            @if (have_rows('python_snippets'))
                <a href="#" data-target="python" class="btn-api">Python</a>
            @endif
            @if (have_rows('php_snippets'))
                <a href="#" data-target="php" class="btn-api">PHP</a>
            @endif
        </div>
    @endif
    @if (have_rows('curl_snippets'))
        <div class="dev-content curl-content" style="display: block;">
            @while (have_rows('curl_snippets'))
                @php(the_row())
                @if (get_sub_field('curl_snippet_title'))
                    <p class="snippet-title">{{ get_sub_field('curl_snippet_title') }}</p>
                @endif
                <div class="snippet">
                    {!! get_sub_field('curl_snippet') !!}
                </div>                                 
            @endwhile
        </div>
    @endif
    @if (have_rows('python_snippets'))
        <div class="dev-content python-content">
            @while (have_rows('python_snippets'))
                @php(the_row())
                @if (get_sub_field('python_snippet_title'))
                    <p class="snippet-title">{{ get_sub_field('python_snippet_title') }}</p>
                @endif
                <div class="snippet">
                    {!! get_sub_field('python_snippet') !!}
                </div>				
            @endwhile
        </div>
    @endif
    @if (have_rows('php_snippets'))
        <div class="dev-content php-content">
            @while (have_rows('php_snippets'))
                @php(the_row())
                @if (get_sub_field('php_snippet_title'))
                    <p class="snippet-title">{{ get_sub_field('php_snippet_title') }}</p>
                @endif
                <div class="snippet">
                    {!! get_sub_field('php_snippet') !!}
                </div>				
            @endwhile
        </div>
    @endif
</div>