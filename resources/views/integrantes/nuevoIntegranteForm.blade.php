@if (Auth::user()->id_rol == '1')
    <x-app-layout>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('NUEVO INTEGRANTE') }}
                    </h2>
                </x-slot>
                <div class="pb-2">
                    <a href="/integrantes" class="btn btn-primary btn-round">VER INTEGRANTES</a>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="card-body">

                        <form action="{{ route('guardarNuevoIntegrante') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- {{ csrf_field() }} --}}
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="ci"><b>C. I.</b></label>
                                                <input type="text" name="ci" id="ci" maxlength="10"
                                                    class="form-control" required placeholder="Ingresar...">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="complemento"><b>COMPLEMENTO</b></label>
                                                <input type="text" name="complemento" id="complemento" maxlength="2"
                                                    class="form-control" placeholder="Ingresar...">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="cargo"><b>CARGO</b></label>
                                                <input type="text" name="cargo" id="cargo" class="form-control"
                                                    placeholder="Ingresar...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="nombre"><b>NOMBRE</b></label>
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    placeholder="Ingresar...">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="paterno"><b>PATERNO</b></label>
                                                <input type="text" name="paterno" id="paterno" class="form-control"
                                                    placeholder="Ingresar...">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="materno"><b>MATERNO</b></label>
                                                <input type="text" name="materno" id="materno" class="form-control"
                                                    placeholder="Ingresar...">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="imagen"><b>IMAGEN</b></label>
                                        <div class="text-center mt-2">
                                            <img id="imagen-preview" width="350" class="rounded mx-auto d-block"
                                                src="{{ asset('medias/noImage.png') }}" alt="">
                                        </div>
                                        <div class="input-group d-flex justify-content-center mt-3">
                                            <input id="imagen" name="imagen" type="file" accept="image/*" class="form-control" style="display: none;"
                                                onchange="handleImageChange(event)">
                                            <div class="input-group-append">
                                                <a href="#" onclick="document.getElementById('imagen').click()"
                                                    class="btn btn-danger btn-round">Agregar Imagen</a>
                                            </div>
                                        </div>
                                        <input type="hidden" id="imagenActual" name="imagenActual">

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
                            <div class="col-lg-14">
                                <div class="form-group">
                                    <button type="submit" style="color: white"><a
                                            class="btn btn-success btn-round">GUARDAR
                                            DATOS</a></button>
                                    <a href="/programas" class="btn btn-primary btn-round">SALIR</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var selectedFile = null;

            function handleFileChange(event) {
                var fileInput = event.target;
                if (fileInput.files.length > 0) {
                    selectedFile = fileInput.files[0];
                    document.getElementById('imagen_cambiada').value = "1"; // Marcar que se ha cambiado la imagen
                    previewImage(event); // Llamar a la función previewImage para mostrar la vista previa de la imagen
                } else {
                    selectedFile = null;
                    document.getElementById('imagen_cambiada').value = "0"; // Marcar que no se ha cambiado la imagen
                }
            }

            function previewImage(event) {
                var input = event.target;
                var reader = new FileReader();
                reader.onload = function() {
                    var image = document.getElementById('imagen-preview');
                    image.src = reader.result;
                };
                reader.readAsDataURL(selectedFile);
            }
        </script>
    </x-app-layout>
@else
    <script>
        window.location = "{{ route('noticias') }}";
    </script>
@endif
