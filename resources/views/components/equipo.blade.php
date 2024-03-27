<section id="equipo" class="testimonials">
    <div class="container position-relative max-width-container">
        <div class="section-title">
            <h2>EQUIPO<span></span></h2>
        </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <?php foreach ($listaInt as $value) { ?>
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="{{ asset('medias/integrantes/' . $value->imagen) }}" class="testimonial-img"
                            alt="" />
                        <h1>{{ $value->nombre }} {{ $value->paterno }} {{ $value->materno }}</h1>
                        <h3>{{ $value->cargo }}</h3>
                    </div>
                    <?php if(Auth::user() && Auth::user()->id_rol == '1') { ?>
                    <div style="padding-top: 1.5em; display: flex; align-items: center; justify-content: center;">
                        <a href="editarIntegrante/{{ $value->id_int }}" class="editar-btn scrollto">EDITAR</a>
                        <a href="#" onclick="confirmarEliminarIntegrante({{ $value->id_int }})"
                            class="eliminar-btn scrollto">ELIMINAR</a>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
