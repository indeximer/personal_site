<!-- Header -->
<header class="masthead bg-primary text-white text-center">
    <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="{{ asset('storage/uploads/config/' . $config->avatar_img) }}" alt="{{ $config->avatar_alt }}">
        <h1 class="text-uppercase mb-0">{{ $config->nome }}</h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">{{ $config->slogan }}</h2>
    </div>
</header>