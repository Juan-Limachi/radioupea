<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('LISTA DE NOTICIAS') }}
                </h2>
            </x-slot>
            <div class="pb-2">
                <a href="/nuevaNoticia" class="btn btn-primary btn-round">NUEVA NOTICIA</a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table contenidoCentreado">
                            <thead class=" text-primary text-center">
                                <th> # </th>
                                <th> PORTADA </th>
                                <th> CATEGORIA </th>
                                <th> TITULO </th>
                                <th> NOTA </th>
                                <th> FECHA </th>
                                <th> USUARIO </th>
                                <th> ACCIONES </th>
                            </thead>
                            <tbody class="text-center">
                                <?php $con=1; foreach ($listaNot as $value) { ?>
                                <tr style="text-center">
                                    <td>{{ $con++ }} </td>
                                    <td class="">
                                        @if ($value->formato == 'IMAGEN')
                                            <img width="180" 
                                                src="{{ asset('medias/noticias/img/' . $value->portada) }}"
                                                alt="">
                                        @else
                                            <video class="video-fluid" width="180" height="80" preload="metadata" controls muted><source src="{{ asset('medias/noticias/video/' . $value->portada) }}"></video>
                                        @endif
                                    </td>
                                    <td>{{ $value->tipo }}</td>
                                    <td style="width: 150px;">{{ $value->titulo }}</td>
                                    <td style="width: 200px;">{{ substr($value->nota, 0, 50) }}...</td>
                                    <td>{{ $value->fecha }}</td>
                                    <td>{{ $value->usuario }}</td>
                                    <td>
                                        <a href="editarNoticia/{{ $value->id_not }}" style="font-size: 25px"><i
                                                class='bx bxs-edit'></i></a>
                                        <a href="#" onclick="confirmarEliminarNoticia({{ $value->id_not }})"
                                            style="font-size: 25px"><i class='bx bxs-trash'></i></a>

                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
            </div>
        </div>
    </div>
</x-app-layout>
