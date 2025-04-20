@extends('layouts.admin')

@section('admin-page')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Article #{{ $article['id'] }}</h2>
        <div>
            <a href="{{ route('getArticleEdit-ByAdmin', $article['id']) }}" class="btn btn-warning">Modifier</a>
            <a href="{{route('getAllArticles') }}" class="btn btn-primary">Voir sur le site</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Détails de l'article
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $article['title'] }}</h4>
            <h6 class="card-subtitle mb-2 text-muted">
                Par {{ $article['author'] }} - Publié le {{ \Carbon\Carbon::parse($article['published_at'])->format('d/m/Y') }}
            </h6>

            <p class="mb-2"><strong>Catégorie :</strong> 
                <span class="badge bg-primary">{{ $article['category'] }}</span>
            </p>

            <p class="mb-2"><strong>Tags :</strong> 
                @foreach ($article['tags'] as $tag)
                    <span class="badge bg-secondary">{{ $tag }}</span>
                @endforeach
            </p>

            <p class="mb-2"><strong>Slug :</strong> {{ $article['slug'] }}</p>

            <p class="mb-2"><strong>Résumé :</strong><br>{{ $article['summary'] }}</p>

            <hr>
            <h5>Contenu de l'article</h5>
            <div class="bg-light p-3 rounded">
                {!! nl2br(e($article['content'])) !!}
            </div>
        </div>
    </div>

    <a href="{{ route('getAllArticles-ByAdmin') }}" class="btn btn-secondary mt-3">← Retour à la liste</a>
</div>
@endsection
