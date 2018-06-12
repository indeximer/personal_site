<!-- Portfolio Grid Section -->
@if(!$portfolio->isEmpty())
<section class="portfolio" id="portfolio">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Portfólio</h2>
        <hr class="star-dark mb-5">
        <div class="row">
            @foreach($portfolio as $projeto)
                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto" href="{{ $projeto->link }}" target="_blank" title="{{ $projeto->titulo }}">
                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="{{ asset('storage/uploads/portfolio/' . $projeto->imagem) }}" alt="$projeto->imagem_alt">
                    </a>
                </div>
            @endforeach    
        </div>
    </div>
</section>
@endif