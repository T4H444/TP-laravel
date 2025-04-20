@extends('layouts.app')

@section('client-page')
    <div class="container py-4">
        <h2 class="mb-4">Articles dans la catégorie : <strong>{{ $category }}</strong></h2>

        @if($articles->isEmpty())
            <p>Aucun article trouvé pour cette catégorie.</p>
        @else
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article['title'] }}</h5>
                                <p class="card-text">{{ Str::limit($article['content'], 100) }}</p>
                                <a href="{{ route('getArticleById', ['id' => $article['id']]) }}" class="btn btn-primary">
                                    Lire plus
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('getAllArticles') }}" class="btn btn-secondary mt-4">← Retour à tous les articles</a>
    </div>
@endsection
