@if (Auth::user()->id_rol == '1')
    <x-app-layout>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('LISTA DE INTEGRANTES') }}
                    </h2>
                </x-slot>
                <div class="pb-2">
                    <a href="/nuevoIntegrante" class="btn btn-primary btn-round">NUEVO INTEGRANTE</a>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table contenidoCentreado">
                                <thead class=" text-primary text-center">
                                    <th> # </th>
                                    <th> IMAGEN </th>
                                    <th> C. I. </th>
                                    <th> NOMBRE </th>
                                    <th> APELLIDO </th>
                                    <th> CARGO </th>
                                    <th> USUARIO </th>
                                    <th> ESTADO</th>
                                    <th> ACCIONES </th>
                                </thead>
                                <tbody class="text-center">
                                    <?php $con=1; foreach ($listaInt as $value) { ?>
                                    <tr style="line-height: 30px;">
                                        <td>{{ $con++ }} </td>
                                        <td>
                                            <img width="180"
                                                src="{{ asset('medias/integrantes/' . $value->imagen) }}"
                                                alt="">
                                        </td>
                                        @if ($value->complemento ?? null)
                                            <td>{{ $value->ci . ' - ' . $value->complemento }}</td>
                                        @else
                                            <td>{{ $value->ci }}</td>
                                        @endif
                                        <td>{{ $value->nombre }}</td>
                                        <td>{{ $value->paterno . ' ' . $value->materno }}</td>
                                        <td  style="width: 50px;">{{ $value->cargo }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->estado }}</td>
                                        <td>
                                            <a href="editarIntegrante/{{ $value->id_int }}" style="font-size: 25px"><i
                                                    class='bx bxs-edit'></i></a>
                                            <a href="#" onclick="confirmarEliminarIntegrante({{ $value->id_int }})"
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
                                <a class="page-link" href="{{ $listaInt->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $listaInt->lastPage(); $i++)
                                <li class="page-item {{ $i == $listaInt->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $listaInt->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href="{{ $listaInt->nextPageUrl() }}" aria-label="Next">
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
@else
    <script>
        window.location = "{{ route('noticias') }}";
    </script>
@endif
