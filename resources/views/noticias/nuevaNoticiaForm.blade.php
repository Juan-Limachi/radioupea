<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('NUEVA NOTICIA') }}
                </h2>
            </x-slot>
            <div class="pb-2">
                <a href="/noticias" class="btn btn-primary btn-round">VER NOTICIAS</a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="card-body">

                    <form action="{{ route('guardarNuevaNoticia') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- {{ csrf_field() }} --}}
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="formato"><b>FORMATO DE PORTADA</b></label>
                                            <select name="formato" id="formato" class="form-control" required>
                                                <option></option>
                                                @foreach ($formatos as $value)
                                                    <option value="{{ $value }}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="tipo"><b>CATEGORIA</b></label>
                                            <select name="tipo" id="tipo" class="form-control" required>
                                                <option></option>
                                                @foreach ($tipos as $value)
                                                    <option value="{{ $value }}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="titulo"><b>TITULO</b></label>
                                            <input type="text" name="titulo" id="titulo" class="form-control"
                                                placeholder="Ingresar...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="nota"><b>NOTA</b></label>
                                            <textarea rows="10" style="resize: none;" name="nota" id="nota" class="form-control"
                                                placeholder="Ingresar..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="fecha"><b>FECHA</b></label>
                                            <input type="date" name="fecha" id="fecha" class="form-control"
                                                required placeholder="Ingresar...">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="usuario"><b>USUARIO</b></label>
                                            <select name="usuario" id="usuario" class="form-control" disabled
                                                required>
                                                <option></option>
                                                @foreach ($users as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == Auth::user()->id ? 'selected' : '' }}>
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                                <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="portada"><b>PORTADA</b></label>
                                    <div class="text-center mt-2" id="filePreviewContainer">
                                        <img id="filePreview" width="350" class="rounded mx-auto d-block"
                                            src="{{ asset('medias/noImage.png') }}" alt="">
                                    </div>
                                    <div class="input-group d-flex justify-content-center mt-3">
                                        <input id="portada" name="portada" type="file" accept="image/*, video/*"
                                            class="form-control" style="display: none;"
                                            onchange="handleFileChange(event)">
                                        <div class="input-group-append">
                                            <a href="#" onclick="document.getElementById('portada').click()"
                                                class="btn btn-danger btn-round">Agregar Archivo</a>
                                        </div>
                                    </div>
                                    <input type="hidden" id="fileActual" name="fileActual">
                                    <input type="hidden" id="fileCambiado" name="fileCambiado" value="0">
                                </div>
                                <div>
                                    @error('portada')
                                        <span class=" text-sm text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-ls-14">
                            <div class="form-group">
                                <button type="submit" style="color: white"><a
                                        class="btn btn-success btn-round">GUARDAR
                                        DATOS</a></button>
                                <a href="/noticias" class="btn btn-primary btn-round">SALIR</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
