{{--
Template Name: Podcast
--}}

@extends('layouts.app')

@section('content')

    @include('partials/podcast/hero', ['data' => get_field('hero')])

    @include('partials/podcast/podcast-cards', ['data' => get_field('podcast_cards_segment')])

    @include('partials/podcast/two-col', ['data' => get_field('two_column')])

    @include('partials/podcast/team-segment', ['data' => get_field('team_segment')])

    @include('partials/fc-content/global/divider')

    @include('partials/podcast/footer-text', ['data' => get_field('footer_text')])

    @include('partials/podcast/dual-cta-footer', ['data' => get_field('dual_cta_footer')])

@endsection
