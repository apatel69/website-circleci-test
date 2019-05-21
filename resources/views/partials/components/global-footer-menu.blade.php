@include('partials.fc-content.global.divider')
<div class="container no-side-pad-tablet">
  <div class="footer-nav">
    <div class="footer-col">
      <a href="{{ get_site_url() }}">
        <img src="@asset('images/navigation/default-logo.svg')" alt="FreshBooks Cloud Accounting" class="footer-logo">
      </a>
    </div>
    @php
      $location = 'footer-col-1';
      $menu_name = get_menu_name($location);
    @endphp
    @if ($menu_name)
    <div class="footer-col">
      <span class="footer-top-level">{{ $menu_name }}</span>
      <div class="footer-sub-links">
        @if (has_nav_menu($location))
          {!! wp_nav_menu([
            'theme_location' => $location,
            'container'=> false,
            'menu_class'=> false,
          ]) !!}
        @endif
      </div>
    </div>
    @endif

    @php
      $location = 'footer-col-2';
      $menu_name = get_menu_name($location);
    @endphp
    @if ($menu_name)
    <div class="footer-col">
      <span class="footer-top-level">{{ $menu_name }}</span>
      <div class="footer-sub-links">
        @if (has_nav_menu($location))
          {!! wp_nav_menu([
            'theme_location' => $location,
            'container'=> false,
            'menu_class'=> false,
          ]) !!}
        @endif
      </div>
    </div>
    @endif

    @php
      $location = 'footer-col-3';
      $menu_name = get_menu_name($location);
    @endphp
    @if ($menu_name)
    <div class="footer-col">
      <span class="footer-top-level">{{ $menu_name }}</span>
      <div class="footer-sub-links">
        @if (has_nav_menu($location))
          {!! wp_nav_menu([
            'theme_location' => $location,
            'container'=> false,
            'menu_class'=> false,
          ]) !!}
        @endif
      </div>
      @php
        $location = 'footer-col-4';
        $menu_name2 = get_menu_name($location);
      @endphp
      @if ($menu_name2)
      <span class="footer-top-level second-row">{{ $menu_name2 }}</span>
      <div class="footer-sub-links">
        @if (has_nav_menu($location))
          {!! wp_nav_menu([
            'theme_location' => $location,
            'container'=> false,
            'menu_class'=> false,
          ]) !!}
        @endif
      </div>
      @endif
    </div>
    @endif
    @php
      $location = 'footer-col-5';
      $menu_name = get_menu_name($location);
    @endphp
    <div class="footer-col">
      <span class="footer-top-level">{{ $menu_name }}</span>
      <div class="footer-sub-links">
        @if (has_nav_menu($location))
          {!! wp_nav_menu([
            'theme_location' => $location,
            'container'=> false,
            'menu_class'=> false,
          ]) !!}
        @endif
      </div>
    </div>

    @php
      $location = 'footer-col-6';
      $menu_name = get_menu_name($location);
    @endphp
    <div class="footer-col">
      <span class="footer-top-level">{{ $menu_name }}</span>
      <div class="footer-sub-links">
        @if (has_nav_menu($location))
          {!! wp_nav_menu([
            'theme_location' => $location,
            'container'=> false,
            'menu_class'=> false,
          ]) !!}
        @endif
      </div>
    </div>
  </div>
</div>
