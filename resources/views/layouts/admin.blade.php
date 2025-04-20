<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{ route('getAllArticles-ByAdmin') }}">
                    Admin-Mini Blog IT
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-between w-100">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page"
                                href="{{ route('getAllArticles-ByAdmin') }}">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('getAllArticles') }}">Retour au site</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    @php
        $adminMode = request()->query('admin') == '1';
    @endphp
    <main class="container mt-3">
        @if ($adminMode)
            <div class="alert alert-info">
                <b>Mode Administration</b> - Cet espace est protege par un middleware
            </div>
        @endif
        @yield('admin-page')
    </main>
</body>

</html>
