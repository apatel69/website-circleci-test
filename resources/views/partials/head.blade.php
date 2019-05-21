<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="msvalidate.01" content="ED10DA14718BD57C514D94385B93BC33" />
    <meta name="apple-itunes-app" content="app-id=1052884030" />
    <meta name="google-site-verification" content="Icc-RvQchUmbVcP7lUYbbWIU-KaNWp42hDOSP9rSfTo" />
    <meta name="author" content="FreshBooks">
    <link rel="preload" as="font" crossorigin type="font/woff" href="@asset('fonts/FranklinGothicURW-Lig.woff')" />
    <link rel="preload" as="font" crossorigin type="font/woff" href="@asset('fonts/FranklinGothicURW-Boo.woff')" />
    <link rel="preload" as="font" crossorigin type="font/woff" href="@asset('fonts/FranklinGothicURW-Med.woff')" />
    <link rel="preload" as="font" crossorigin type="font/woff" href="@asset('fonts/FreshBooksScriptWeb-Regular.woff')" />

    @php(wp_head())
  {{--  Load tracking scripts only if WP_ENV is set to production in wp-config.php  --}}
  @if(defined('WP_ENV') && WP_ENV  == 'production') @include('partials/scripts') @endif
  </head>
