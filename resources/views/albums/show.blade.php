@extends('layouts.main')

@section('body-class', 'body-album')
@inject('parser', 'App\Helpers\Parser')
@inject('albumHelper', 'App\Helpers\Album')

@section('navigation')
    @include('layouts._nav')
@endsection

@section('content')

    <header class="header album-header">
        <div
        @if($album->image)
            class="header-background header-background--has-image" style="background-image: url({{ $album->image }});"
        @else
            class="header-background"
        @endif
        ></div>

        <div class="container">
           <div class="header-container">
                @if($album->image)
                <div class="header-avatar">
                    <div class="header-avatar-wrapper">
                        <img src="{{ $album->image }}">
                    </div>
                </div>
                @endif
                <div class="header-content">

                    <h2 class="header-subtitle">
                        {!! $albumHelper->bandLinks($album) !!}
                    </h2>

                    <div class="header-title-wrapper">
                        <h1 class="header-title"><a href="{{ $album->permalink }}">{{ $album->title }}</a></h1>
                        @if($album->review_count)
                        <div class="review-wrapper">
                            <span class="review-score review-score-{{ round($album->median_score, -1) }}">{{ $album->median_score }}%</span>
                            <span class="review-count">{{ $album->review_count }} {{ str_plural('review', $album->review_count) }}</span>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </header>

    <div class="header-secondary header--has-image">
        <div class="container">
            <div class="header-metadata">
                <ul>
                    <li>
                        <h4>Type</h4>
                        <p>{{ $album->type }}</p>
                    </li>
                    <li>
                        <h4>Label</h4>
                        <p>{{ $album->label }}</p>
                    </li>
                    <li>
                        <h4>Release date</h4>
                        <p>{{ $album->published_at->format('F jS, Y') }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-title-wrapper">
                        <h2 class="section-title">{{ $album->title }} reviews</h2>
                    </div>
                    @forelse($album->reviews as $review)
                        <div class="review">
                            <div class="review-wrapper">
                            <span style="margin-left: 0" class="review-score review-score-{{ round($review->score, -1) }}">{{ $review->score }}%</span></div>
                            <h4 class="review-title">{{ $review->title }}</h4>
                            <h5 class="review-author">By <a href="https://www.metal-archives.com/users/{{ $review->author }}" target="_blank">{{ $review->author }}</a> on {{ $review->published_at->format('F jS, Y') }}</h5>
                            <div class="review-content">{!! $parser->nl2p($review->body) !!}</div>
                        </div>
                    @empty
                    <div>There are no reviews yet</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection