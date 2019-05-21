@php
    $header = get_field('api_custom_header', 'option');
    $menu = 'select-report-menu';
@endphp

<div class="desktop-nav">
    <div class="nav-wrapper">
        <div class="container">

            <a href="{{ home_url('/') }}" target="_blank" class="nav-logo">
                <img src="@asset('images/select/freshbooks-select-logo.svg')" alt="FreshBooks Cloud Accounting">
            </a>

            <nav role="navigation" class="nav-item">
                <ul id="menu-visit-freshbooks" class="menu">
                    <li id="menu-item-2238" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-2238">
                        <a href="https://www.freshbooks.com/" target="_blank">Visit FreshBooks.com</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</div>

<div class="mobile-nav">
    <div class="mobile-nav-wrapper">
        <div class="container">
            <a href="{{ home_url('/') }}" target="_blank" class="nav-logo">
                <img src="@asset('images/select/freshbooks-select-logo.svg')" alt="FreshBooks Cloud Accounting">
            </a>

            <nav role="navigation" class="nav-item">
                <ul id="menu-visit-freshbooks" class="menu">
                    <li id="menu-item-2238" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-2238">
                        <a href="https://www.freshbooks.com/" target="_blank">Visit FreshBooks.com</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</div>
