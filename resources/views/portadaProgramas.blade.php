@extends('plantilla')
@section('contenido')
    <section id="programasTitle" class="events">
        <div class="swiper-container max-width-container mb-3">
            <div class="section-title">
                <h2>PROGRAMAS<span></span></h2>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="{{ $listaPro->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $listaPro->lastPage(); $i++)
                    <li class="page-item {{ $i == $listaPro->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $listaPro->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $listaPro->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="swiper-container max-width-container pt-4">
            <div class="row event-item">
                <?php foreach ($listaPro as $value) { ?>
                <div class="col-md-6 pb-1">
                    <div class="section-title">
                        <h2><span>{{ $value->titulo }}</span></h2>
                    </div>
                    <div class="row event-item">
                        <div class="pb-3">
                            @if ($value->formato == 'IMAGEN')
                                <div class="d-lg-flex align-items-center img-box">
                                    <img src="{{ asset('medias/programas/img/' . $value->portada) }}" class="img-fluid"
                                        alt="" />
                                </div>
                            @else
                                <div class="align-items-center video-box">
                                    <video width="480" height="280" preload="metadata" controls muted
                                        src="{{ asset('medias/programas/video/' . $value->portada) }}"
                                        class="video-fluid"></video>
                                </div>
                            @endif
                            <div class="pt-1 pt-lg-0 content">
                                <div class="price mt-3">
                                    <p><span>DIAS:</span> {{ $value->dias }}</p>
                                </div>
                                <p class="fst-italic">
                                    {{ $value->descripcion }}
                                </p>
                                <p><strong>HORARIO: </strong>{{ $value->hr_inicio }} - {{ $value->hr_fin }}</p>
                                <?php if(Auth::user()) { ?>
                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <a href="editarPrograma/{{ $value->id_pro }}" class="editar-btn scrollto">EDITAR</a>
                                    <a href="#" onclick="confirmarEliminarPrograma({{ $value->id_pro }})"
                                        class="eliminar-btn scrollto">ELIMINAR</a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php } ?>
            </div>
    </section>
    <script>
        window.onload = function() {
            // Obtenemos el elemento del título de los programas
            var programasTitle = document.getElementById('programasTitle');

            // Desplazamos la página hasta el título de los programas
            programasTitle.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        };
    </script>
@endsection
