@extends('layouts.app')

@section('client-page')
    <div class="container py-4">

    @if($request->query('category'))
    <div class="row">
    @foreach ($articles as $article)
    @if($article['category'] == $request->query('category'))
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">{{ $article['title'] }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Par <strong>{{ $article['author'] }}</strong> – {{ $article['published_at'] }}
                            </h6>
                            <div class="mb-2">
                                @foreach ($article['tags'] as $tag)
                                    <span class="badge bg-primary me-1">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <p class="card-text text-truncate" style="max-height: 4.5em; overflow: hidden;">
                                {{ $article['content'] }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="{{ route('getArticleById', ['id' => $article['id']]) }}" class="btn btn-outline-primary w-100">
                                Lire l'article
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
</div>
@else
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">{{ $article['title'] }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Par <strong>{{ $article['author'] }}</strong> – {{ $article['published_at'] }}
                            </h6>
                            <div class="mb-2">
                                @foreach ($article['tags'] as $tag)
                                    <span class="badge bg-primary me-1">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <p class="card-text text-truncate" style="max-height: 4.5em; overflow: hidden;">
                                {{ $article['content'] }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="{{ route('getArticleById', ['id' => $article['id']]) }}" class="btn btn-outline-primary w-100">
                                Lire l'article
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
