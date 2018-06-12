<!-- Bio Section -->
<section class="bg-primary text-white mb-0" id="about">
    <div class="container">
        <h2 class="text-center text-uppercase text-white">{{ $bio->titulo }}</h2>
        <hr class="star-light mb-5">
        <div class="row">
            <div class="col-lg-8 m-auto lead">
                {!! $bio->descricao !!}
            </div>
        </div>
    </div>
</section>