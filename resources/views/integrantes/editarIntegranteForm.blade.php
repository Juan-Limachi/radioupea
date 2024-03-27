@if (Auth::user()->id_rol == '1')
    <x-app-layout>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('EDITAR INTEGRANTE') }}
                    </h2>
                </x-slot>
                <div class="pb-2">
                    <a href="/integrantes" class="btn btn-primary btn-round">VER INTEGRANTES</a>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="card-body">

                        <form action="{{ route('guardarEditarIntegrante') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- {{ csrf_field() }} --}}
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="ci"><b>C. I.</b></label>
                                                <input type="text" name="ci" id="ci" class="form-control"
                                                    placeholder="Ingresar..." required maxlength="10"
                                                    value="{{ $obj->ci }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="complemento"><b>COMPLEMENTO</b></label>
                                                <input type="text" name="complemento" id="complemento" maxlength="2"
                                                    class="form-control" placeholder="Ingresar..."
                                                    value="{{ $obj->complemento }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="estado"><b>ESTADO</b></label>
                                                <select name="estado" id="estado" class="form-control" required>
                                                    <option></option>
                                                    @foreach ($estados as $value)
                                                        <option value="{{ $value }}"
                                                            {{ $value == $obj->estado ? 'selected' : '' }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="cargo"><b>CARGO</b></label>
                                                <input type="text" name="cargo" id="cargo" class="form-control"
                                                    placeholder="Ingresar..." value="{{ $obj->cargo }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="nombre"><b>NOMBRE</b></label>
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    placeholder="Ingresar..." value="{{ $obj->nombre }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="paterno"><b>AP. PATERNO</b></label>
                                                <input type="text" name="paterno" id="paterno" class="form-control"
                                                    placeholder="Ingresar..." value="{{ $obj->paterno }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="materno"><b>AP. MATERNO</b></label>
                                                <input type="text" name="materno" id="materno" class="form-control"
                                                    placeholder="Ingresar..." value="{{ $obj->materno }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="imagen"><b>IMAGEN</b></label>
                                        <div class="text-center mt-2">
                                            <img id="imagen-preview" width="350" class="rounded mx-auto d-block"
                                                src="{{ asset('medias/integrantes/' . $obj->imagen) }}" alt="">
                                        </div>

                                        <div class="input-group d-flex justify-content-center mt-3">
                                            <input id="imagen" name="imagen" type="file" accept="image/*" class="form-control" style="display: none;"
                                                onchange="handleImageChange(event)">
                                            <div class="input-group-append">
                                                <a href="#" onclick="document.getElementById('imagen').click()"
                                                    class="btn btn-danger btn-round">Cambiar Imagen</a>
                                            </div>
                                        </div>
                                        <input type="hidden" id="imagenActual" name="imagenActual"
                                        value="{{ $obj->imagen }}">

                                        <input type="hidden" id="imagen_cambiada" name="imagen_cambiada"
                                            value="0"> 
                                    </div>

                                    <div>
                                        @error('imagen')
                                            <span class=" text-sm text-red-600" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="id_int" name="id_int" value="{{ $obj->id_int }}">

                            <div class="col-lg-14">
                                <div class="form-group">
                                    <button type="submit" style="color: white"><a
                                            class="btn btn-success btn-round">GUARDAR DATOS</a></button>
                                    <a href="/integrantes" class="btn btn-primary btn-round">SALIR</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <script>
        window.location = "{{ route('noticias') }}";
    </script>
@endif
