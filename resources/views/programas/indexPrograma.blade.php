<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('LISTA DE PROGRAMAS') }}
                </h2>
            </x-slot>
            <div class="pb-2">
                <a href="/nuevoPrograma" class="btn btn-primary btn-round">NUEVO PROGRAMA</a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table contenidoCentreado">
                            <thead class=" text-primary text-center">
                                <th> # </th>
                                <th> PORTADA </th>
                                <th> TITULO </th>
                                <th> DESCRIPCION </th>
                                <th> ESTADO </th>
                                <th> DIAS </th>
                                <th> INICIO </th>
                                <th> FIN </th>
                                <th> USUARIO </th>
                                <th> ACCIONES </th>
                            </thead>
                            <tbody class="text-center">
                                <?php $con = 1; ?>
                                @foreach ($listaPro as $value)
                                    <tr style="line-height: 30px;">
                                        <td>{{ $con++ }}</td>
                                        <td>
                                            @if ($value->formato == 'IMAGEN')
                                                <img width="180"
                                                    src="{{ asset('medias/programas/img/' . $value->portada) }}"
                                                    alt="">
                                            @else
                                                <video class="video-fluid" width="180" height="80"
                                                    preload="metadata" controls muted>
                                                    <source
                                                        src="{{ asset('medias/programas/video/' . $value->portada) }}">
                                                </video>
                                            @endif
                                        </td>
                                        <td style="width: 80px;">{{ $value->titulo }}</td>
                                        <td style="width: 120px;">{{ substr($value->descripcion, 0, 50) }}...</td> 
                                        <td>{{ $value->estado }}</td>
                                        <td style="width: 50px;">{{ $value->dias }}</td>
                                        <td>{{ $value->hr_inicio }}</td>
                                        <td>{{ $value->hr_fin }}</td>
                                        <td>{{ $value->usuario }}</td>
                                        <td>
                                            <a href="editarPrograma/{{ $value->id_pro }}" style="font-size: 25px"><i
                                                    class='bx bxs-edit'></i></a>
                                            <a href="#"
                                                onclick="confirmarEliminarPrograma({{ $value->id_pro }})"><i
                                                    class='bx bxs-trash' style="font-size: 25px"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            </div>
        </div>
    </div>
</x-app-layout>
