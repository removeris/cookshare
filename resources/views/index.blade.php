@extends('layouts.base')

@section('title', 'Index page')

@push('styles')
    @vite('resources/css/index.css')
@endpush

@section('content')
    <div class="hero">
        <h3>A recipe has no soul. <span>You</span>, as the cook, must bring <span>soul</span> to the recipe.</h3>
        <img src="https://www.gourmetfoodparlour.com/img/containers/assets/full-width-slider/full-width-slider-tapasselection.jpg/40d6d1da2168cf4fb37f76cc53f00ea3.webp">
    </div>
@endsection