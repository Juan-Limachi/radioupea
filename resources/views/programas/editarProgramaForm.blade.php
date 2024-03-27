<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('EDITAR PROGRAMA') }}
                </h2>
            </x-slot>
            <div class="pb-2">
                <a href="/programas" class="btn btn-primary btn-round">VER PRORGRAMAS</a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="card-body">

                    <form action="{{ route('guardarEditarPrograma') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- {{ csrf_field() }} --}}
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="formato"><b>FORMATO DE PORTADA</b></label>
                                            <select name="formato" id="formato" class="form-control" required>
                                                <option></option>
                                                @foreach ($formatos as $value)
                                                    <option value="{{ $value }}"
                                                        {{ $value == $obj->formato ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
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
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="usuario"><b>USUARIO</b></label>
                                            <select name="usuario" id="usuario" class="form-control" disabled required>
                                                <option></option>
                                                @foreach ($users as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == Auth::user()->id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                                <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="titulo"><b>TITULO</b></label>
                                            <textarea rows="2" style="resize: none;" name="titulo" id="titulo" class="form-control"
                                                placeholder="Ingresar...">{{ $obj->titulo }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="descripcion"><b>DESCRIPCION</b></label>
                                            <textarea rows="7" style="resize: none;" name="descripcion" id="descripcion" class="form-control"
                                                placeholder="Ingresar...">{{ $obj->descripcion }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label><b>DIAS</b></label>
                                            <div class="d-flex flex-wrap">
                                                @foreach ($dias as $index => $value)
                                                    <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3 mb-3">
                                                        <input type="checkbox" name="dias[]"
                                                            value="{{ $value }}" class="me-1"
                                                            {{ in_array($value, $diasArray) ? 'checked' : '' }}>
                                                        <span class="mx-1">{{ $value }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inicio"><b>INICIO</b></label>
                                            <input type="time" name="inicio" id="inicio" class="form-control"
                                                placeholder="Ingresar..." value="{{ $obj->hr_inicio }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="fin"><b>FIN</b></label>
                                            <input type="time" name="fin" id="fin" class="form-control"
                                                placeholder="Ingresar..." value="{{ $obj->hr_fin }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="portada"><b>PORTADA</b></label>
                                    <div class="text-center mt-2" id="filePreviewContainer">
                                        @if ($obj->formato == 'IMAGEN')
                                            <img id="filePreview" width="350" class="rounded mx-auto d-block"
                                                src="{{ asset('medias/programas/img/' . $obj->portada) }}"
                                                alt="">
                                        @else
                                            <video id="filePreview" class="rounded mx-auto d-block" width="350" height="260" preload="metadata" controls muted src="{{ asset('medias/programas/video/' . $obj->portada) }}"></video>
                                        @endif
                                    </div>
                                    <div class="input-group d-flex justify-content-center mt-3">
                                        <input id="portada" name="portada" type="file"
                                            accept="image/*, video/*" class="form-control" style="display: none;"
                                            onchange="handleFileChange(event)">
                                        <div class="input-group-append">
                                            <a href="#" onclick="document.getElementById('portada').click()"
                                                class="btn btn-danger btn-round">Cambiar Archivo</a>
                                        </div>
                                    </div>
                                    <input type="hidden" id="fileActual" name="fileActual"
                                        value="{{ $obj->portada }}">
                                    <input type="hidden" id="fileCambiado" name="fileCambiado" value="0">
                                    <div>
                                        @error('portada')
                                            <span class=" text-sm text-red-600" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="id_pro" name="id_pro" value="{{ $obj->id_pro }}">

                            <div class="col-lg-14">
                                <div class="form-group">
                                    <button type="submit" style="color: white"><a
                                            class="btn btn-success btn-round">GUARDAR DATOS</a></button>
                                    <a href="/programas" class="btn btn-primary btn-round">SALIR</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
