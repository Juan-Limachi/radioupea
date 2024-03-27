@if (Auth::user()->id_rol == '1')
    <x-app-layout>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('NUEVO USUARIO') }}
                    </h2>
                </x-slot>
                <div class="pb-2">
                    <a href="/usuarios" class="btn btn-primary btn-round">VER USUARIOS</a>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="card-body">

                        <form id="guardarNuevoUsuario" action="{{ route('guardarNuevoUsuario') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><b>C. I.</b></label>
                                        <input type="text" name="ci" class="form-control" maxlength="10"
                                            required placeholder="Ingresar...">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><b>NOMBRE</b></label>
                                        <input type="text" name="nombre" class="form-control" required
                                            placeholder="Ingresar...">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><b>PATERNO</b></label>
                                        <input type="text" name="paterno" class="form-control"
                                            placeholder="Ingresar...">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><b>MATERNO</b></label>
                                        <input type="text" name="materno" class="form-control"
                                            placeholder="Ingresar...">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><b>CORREO</b></label>
                                        <input type="email" name="email" class="form-control" required
                                            placeholder="Ingresar...">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><b>ROL</b></label>
                                        <select name="id_rol" id="" class="form-control" required>
                                            <option></option>
                                            @foreach ($rols as $value)
                                                <option value="{{ $value->id_rol }}">{{ $value->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" style="color: white"><a
                                                class="btn btn-success btn-round">GUARDAR DATOS</a></button>
                                        <a href="/usuarios" class="btn btn-primary btn-round">SALIR</a>
                                    </div>
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
