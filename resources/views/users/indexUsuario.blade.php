@if (Auth::user()->id_rol == '1')
    <x-app-layout>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('LISTA DE USUARIOS') }}
                    </h2>
                </x-slot>
                <div class="pb-2">
                    <a href="/nuevoUsuario" class="btn btn-primary btn-round">NUEVO USUARIO</a>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table contenidoCentreado">
                                <thead class=" text-primary text-center">
                                    <th> # </th>
                                    <th> C.I. </th>
                                    <th> NOMBRE </th>
                                    <th> APELLIDO </th>
                                    <th> USUARIO </th>
                                    <th> EMAIL </th>
                                    <th> ROL </th>
                                    <th> ESTADO </th>
                                    <th> ACCIONES </th>
                                </thead>
                                <tbody class="text-center">
                                    <?php $con=1; foreach ($listaUsu as $value) { ?>
                                    <tr style="line-height: 30px;">
                                        <td>{{ $con++ }}</td>
                                        <td>{{ $value->ci }}</td>
                                        <td>{{ $value->nombre }}</td>
                                        <td>{{ $value->paterno . ' ' . $value->materno }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->rol_nombre }}</td>
                                        <td>{{ $value->estado }}</td>
                                        <td>
                                            <a href="editarUsuario/{{ $value->id }}" style="font-size: 25px"
                                                title="Editar Usuario"><i class='bx bxs-edit'></i></a>
                                            @if ($value->estado === 'INACTIVO')
                                                <a href="#"
                                                    onclick="confirmarActivarUsuario({{ $value->id }})"
                                                    style="font-size: 25px" title="Activar Usuario"><i
                                                        class="bx bx-recycle"></i>
                                                </a>
                                            @else
                                                <a href="#"
                                                    onclick="confirmarEliminarUsuario({{ $value->id }})"
                                                    style="font-size: 25px" title="Eliminar Usuario"><i
                                                        class='bx bxs-trash'></i></a>
                                            @endif
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
                                <a class="page-link" href="{{ $listaUsu->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $listaUsu->lastPage(); $i++)
                                <li class="page-item {{ $i == $listaUsu->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $listaUsu->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href="{{ $listaUsu->nextPageUrl() }}" aria-label="Next">
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
