<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nuevo Médico') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>
<body>



<div class="container">
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="col-x1-12">
                    <form action=" {{route('medicos.store')}} " method="post">
                         @csrf

                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" required maxlength="50">
                        </div>

                        <div class="mb-3">
                             <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="nombres" required maxlength="50">
                        </div>

                        <div class="mb-3">
                            <label for="ci" class="form-label">C.I.</label>
                             <input type="text" class="form-control" name="ci" required maxlength="10">
                        </div>
                        
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono_domicilio" class="form-label">Teléfono Domicilio</label>
                            <input type="text" name="telefono_domicilio" id="telefono_domicilio" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono_trabajo" class="form-label">Teléfono Trabajo</label>
                            <input type="text" name="telefono_trabajo" id="telefono_trabajo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono_celular" class="form-label">Teléfono Celular</label>
                            <input type="text" name="telefono_celular" id="telefono_celular" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" required>
                        </div>
                       
                      
                        <div class="mb-3">
                             <label for="estado_civil" class="form-label">Estado civil</label>
                             <input type="text" class="form-control" name="estado_civil" required maxlength="15">
                        </div>

                        <div class="mb-3">
                             <label for="licencia" class="form-label">Licencia Médica</label>
                             <input type="text" class="form-control" name="licencia" required maxlength="15">
                        </div>



                        <div class="mb-3">

                            <label for="especialidad_id" class="form-label">Especialidad</label>
                            <select name="especialidad_id" id="especialidad_id" class="form-control">
                                <option value="">Seleccionar</option>
                                @foreach ($especialidades as $especialidad)
                                    <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                @endforeach
                            </select>
                           


                        </div>


                        
                        <div class="mb-3">
                             <label for="name" class="form-label">Nombre Usuario</label>
                             <input type="text" class="form-control" name="name" required maxlength="15">
                        </div>

                        <div class="mb-3">
                             <label for="email" class="form-label">Correo electrónico</label>
                             <input type="email" class="form-control" name="email" required maxlength="50">
                        </div>

                        <div class="mb-3">
                             <label for="password" class="form-label">Password</label>
                             <input type="password" class="form-control" name="password" required maxlength="50">
                        </div>


                         <div class="form-group">
                           <input type="submit" class="btn btn-primary" value="Guardar">
                            <input type="reset"  class="btn btn-default" value="Cancelar">
                            <a href="javascript:history.back()">Ir al listado</a>
                        </div>


                    </form>
            </div>     
        </div>
</div>
</body>
</x-app-layout>