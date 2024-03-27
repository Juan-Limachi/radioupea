<section id="" class="events">
    <div class="swiper-container max-width-container">
        <div class="section-title">
            <h2>ULTIMAS NOTICIAS<span></span></h2>
        </div>
        <div class="events-slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($listaNot as $value) { ?>
                <div class="swiper-slide">
                    <div class="row event-item">
                        @if ($value->formato == 'IMAGEN')
                            <div class="col-lg-6 d-lg-flex align-items-center img-box">
                                <img src="{{ asset('medias/noticias/img/' . $value->portada) }}" class="img-fluid"
                                    alt="" />
                            </div>
                            <div class="col-lg-6 pt-1 pt-lg-0 content">
                                <h3>{{ $value->titulo }}</h3>
                                <div class="price">
                                    <p>CATEGORIA: <span>{{ $value->tipo }}</span></p>
                                </div>
                                <p class="fst-italic">
                                    {{ substr($value->nota, 0, 200) }}...<strong> <a href="#"
                                            onclick="mostrarNoticia('{{ $value->titulo }}', '{{ $value->nota }}', '{{ asset('medias/noticias/img/' . $value->portada) }}', '{{ $value->formato }}')">SEGUIR
                                            LEYENDO</a></strong>
                                </p>
                            </div>
                        @else
                            <div class="col-lg-6 align-items-center video-box">
                                <video class="video-fluid" preload="metadata" controls muted>
                                    <source src="{{ asset('medias/noticias/video/' . $value->portada) }}">
                                </video>
                            </div>
                            <div class="col-lg-6 pt-1 pt-lg-0 content">
                                <h3>{{ $value->titulo }}</h3>
                                <div class="price">
                                    <p>CATEGORIA: <span>{{ $value->tipo }}</span></p>
                                </div>
                                <p class="fst-italic">
                                    {{ substr($value->nota, 0, 200) }}...<strong> <a href="#"
                                            onclick="mostrarNoticia('{{ $value->titulo }}', '{{ $value->nota }}', '{{ asset('medias/noticias/video/' . $value->portada) }}', '{{ $value->formato }}')">SEGUIR
                                            LEYENDO</a></strong>
                                </p>
                                <p><strong>FECHA: </strong>{{ $value->fecha }}</p>
                            </div>
                        @endif
                        <?php if(Auth::user()) { ?>
                        <div style="padding-top: 1.5em; display: flex; align-items: center; justify-content: center;">
                            <a href="editarNoticia/{{ $value->id_not }}" class="editar-btn scrollto">EDITAR</a>
                            <a href="#" onclick="confirmarEliminarNoticia({{ $value->id_not }})"
                                class="eliminar-btn scrollto">ELIMINAR</a>

                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
