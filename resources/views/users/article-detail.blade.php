@extends('users.master')

@section('content')
<section style="padding: 4rem 1rem; max-width: 1200px; margin: 0 auto;">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 2.5em; margin-bottom: 1rem; color: #2c3e50;">{{ $article->title }}</h1>
        
        <div style="display: flex; align-items: center; margin-bottom: 2rem; color: #7f8c8d;">
            <span>By {{ $article->author }}</span>
            <span style="margin: 0 15px;">•</span>
            <span>{{ $article->created_at->format('F d, Y') }}</span>
            <span style="margin: 0 15px;">•</span>
            <span>{{ ceil(str_word_count(strip_tags($article->content)) / 200) }} min read</span>
        </div>

        @if($article->image)
        <div style="margin-bottom: 2rem; border-radius: 10px; overflow: hidden;">
            <img src="{{  asset($article->image) }}" alt="{{ $article->title }}" style="width: 100%; max-height: 500px; object-fit: cover;">
        </div>
        @endif

        <div style="line-height: 1.8; font-size: 1.1em; color: #2c3e50;">
            {!! $article->content !!}
        </div>

        <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #eee;">
            <a href="{{ route('news') }}" style="color: #3498db; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center;">
                ← Back to News
            </a>
        </div>
    </div>
</section>
@endsection