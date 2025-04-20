<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Client</title>
  <!-- Add Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Mini Blog IT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('getAllArticles') }}">Articles</a>
            </li>

            <!-- Dynamic Categories Dropdown -->
            <!-- Dynamic Categories Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Catégories
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @php
                  use App\Data\ArticlesData;
                  $categories = ArticlesData::getCategories();
                @endphp
                
                @foreach ($categories as $category)
                  <li>
                  <a 
                  class="dropdown-item {{ request()->is('articles/category/' . $category) ? 'active' : '' }}"
                  href="{{ route('getAllArticles') }}?category={{$category}}">
               {{ ucfirst($category) }}
                </a>

                  </li>
                @endforeach
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('about-page') }}">A propos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    @yield('client-page')
  </main>

  <!-- Add Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
