@extends('layouts.app')

@section('client-page')
    <div class="container py-5">
        <div class="mb-4">

            <h1 class="mb-3">{{ $article['title'] }}</h1>
            <h5 class="text-muted mb-4">
                Par <strong>{{ $article['author'] }}</strong> – {{ $article['published_at'] }}
            </h5>

            <div class="mb-3">
                @foreach ($article['tags'] as $tag)
                    <span class="badge bg-secondary me-1">{{ $tag }}</span>
                @endforeach
            </div>

            <p class="lead">{{ $article['content'] }}</p>

            <a href="{{ route('getAllArticles') }}" class="btn btn-outline-primary">
            ←  Retour à la liste des articles
</a>
<a class="btn btn-outline-primary" href="{{ route('getAllArticles-ByAdmin') }}">Espace Admin</a>
        </div>
    </div>
@endsection
