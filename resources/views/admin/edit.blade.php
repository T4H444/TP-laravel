@extends('layouts.admin')

@section('admin-page')
<div class="container mt-4">
    <h2 class="mb-4">Modifier l'article #{{ $article['id'] }}</h2>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Formulaire d’édition
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input type="text" class="form-control" value="{{ $article['title'] }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Auteur</label>
                    <input type="text" class="form-control" value="{{ $article['author'] }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Catégorie</label>
                    <select class="form-select" disabled>
                        <option selected>{{ $article['category'] }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date de publication</label>
                    <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($article['published_at'])->format('d/m/Y') }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Résumé</label>
                    <textarea class="form-control" rows="2" readonly>{{ $article['summary'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contenu</label>
                    <textarea class="form-control" rows="5" readonly>{{ $article['content'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tags</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($allTags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" disabled 
                                    {{ in_array($tag, $article['tags']) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $tag }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="alert alert-info mt-4">
                    <strong>Note :</strong> Dans cette version du blog, les articles sont en lecture seule car ils sont stockés en mémoire.
                </div>
            </form>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('getAllArticles-ByAdmin', $article['id']) }}" class="btn btn-secondary">← Retour aux détails</a>
        <a href="{{ route('getAllArticles-ByAdmin') }}" class="btn btn-primary">Retour à la liste</a>
    </div>
</div>
@endsection
