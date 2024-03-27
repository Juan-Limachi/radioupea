@extends('plantilla')
@section('contenido')
    <section id="noticiasTitle" class="events">
        <div class="swiper-container max-width-container mb-3">
            <div class="section-title">
                <h2>NOTICIAS {{ strtoupper($categoria) }}<span></span></h2>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="{{ $listaNot->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $listaNot->lastPage(); $i++)
                    <li class="page-item {{ $i == $listaNot->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $listaNot->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $listaNot->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="swiper-container max-width-container pt-4">
            <div class="row event-item">
                <?php foreach ($listaNot as $value) { ?>
                <div class="col-md-6 pb-5">
                    @if ($value->formato == 'IMAGEN')
                        <div class="d-lg-flex align-items-center img-box">
                            <img src="{{ asset('medias/noticias/img/' . $value->portada) }}" class="img-fluid"
                                alt="" />
                        </div>
                        <div class="pt-1 pt-lg-0 content">
                            <h3>
                                <a href="#"
                                    onclick="mostrarNoticia('{{ $value->titulo }}', '{{ $value->nota }}', '{{ asset('medias/noticias/img/' . $value->portada) }}', '{{ $value->formato }}')">{{ $value->titulo }}</a>
                            </h3>
                        </div>
                    @else
                        <div class="d-lg-flex align-items-center video-box">
                            <video width="480" height="280" preload="metadata" controls muted
                                src="{{ asset('medias/noticias/video/' . $value->portada) }}" class="video-fluid"></video>
                        </div>
                        <div class="pt-1 pt-lg-0 content">
                            <h3>
                                <a href="#"
                                    onclick="mostrarNoticia('{{ $value->titulo }}', '{{ $value->nota }}', '{{ asset('medias/noticias/video/' . $value->portada) }}', '{{ $value->formato }}')">{{ $value->titulo }}</a>
                            </h3>
                        </div>
                    @endif
                    <p><strong>FECHA: </strong>{{ $value->fecha }}</p>
                    <?php if(Auth::user()) { ?>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <a href="/editarNoticia/{{ $value->id_not }}" class="editar-btn scrollto">EDITAR</a>
                        <a href="#" onclick="confirmarEliminarNoticia({{ $value->id_not }})"
                            class="eliminar-btn scrollto">ELIMINAR</a>
                    </div>
                    <?php } ?>
                    <hr>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <script>
        window.onload = function() {
            // Obtenemos el elemento del título de los programas
            var noticiasTitle = document.getElementById('noticiasTitle');
            
            // Desplazamos la página hasta el título de los programas
            noticiasTitle.scrollIntoView({ behavior: 'smooth', block: 'start' });
        };
    </script>
@endsection

