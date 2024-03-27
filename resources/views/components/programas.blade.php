<section id="" class="events">
    <div class="swiper-container max-width-container">
        <div class="section-title">
            <h2>PROGRAMAS<span></span></h2>
        </div>
        <div class="programas-slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($listaPro as $value) { ?>
                <div class="swiper-slide">
                    <div class="row event-item">
                        @if ($value->formato == 'IMAGEN')
                            <div class="col-lg-6 d-lg-flex align-items-center img-box">
                                <img src="{{ asset('medias/programas/img/' . $value->portada) }}" class="img-fluid" alt="" />
                            </div>
                        @else
                            <div class="col-lg-6 align-items-center video-box">
                                <video class="video-fluid" preload="metadata" controls muted><source src="{{ asset('medias/programas/video/' . $value->portada) }}"></video>
                            </div>
                        @endif
                        <div class="col-lg-6 pt-1 pt-lg-0 content">
                            <h3>{{ $value->titulo }}</h3>
                            <div class="price">
                                <p><span>DIAS:</span> {{ $value->dias }}</p>
                            </div>
                            <p class="fst-italic">
                                {{ $value->descripcion }}
                            </p>
                            <p><strong>HORARIO: </strong>{{ substr($value->hr_inicio, 0, 5) }} - {{ substr($value->hr_fin, 0, 5) }}</p>

                        </div>
                        <?php if(Auth::user()) { ?>
                        <div style="padding-top: 1.5em; display: flex; align-items: center; justify-content: center;">
                            <a href="editarPrograma/{{ $value->id_pro }}" class="editar-btn scrollto">EDITAR</a>
                            <a href="#" onclick="confirmarEliminarPrograma({{ $value->id_pro }})"
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
