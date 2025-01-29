<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Paciente') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>



<body>
<div  class="container">
      
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">


                    <form action="{{ route('pacientes.update',$pacientes->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" required maxlength="50" value="{{$personales->apellidos}}">

                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombres" required maxlength="50" value="{{$personales->nombres}}">
                    </div>
                    <div class="mb-3">
                        <label for="ci" class="form-label">C.I.</label>
                        <input type="text" class="form-control" name="ci" required maxlength="15" value="{{$personales->ci}}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" name="fecha_nacimiento" required  value="{{$personales->fecha_nacimiento}}">
                    </div>
                    <div class="mb-3">
                        <label for="telefono_domicilio" class="form-label">Teléfono Domicilio</label>
                        <input type="text" class="form-control" name="telefono_domicilio" required maxlength="15" value="{{$personales->telefono_domicilio}}">
                    </div>
                    <div class="mb-3">
                        <label for="telefono_trabajo" class="form-label">Telefono Trabajo</label>
                        <input type="text" class="form-control" name="telefono_trabajo" required maxlength="15" value="{{$personales->telefono_trabajo}}">
                    </div>
                    <div class="mb-3">
                        <label for="telefono_celular" class="form-label">Telefono Celular</label>
                        <input type="text" class="form-control" name="telefono_celular" required maxlength="15" value="{{$personales->telefono_celular}}">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" required maxlength="80" value="{{$personales->direccion}}">
                    </div>

                    <div class="mb-3">
                        <label for="estado_civil" class="form-control">Estado civil</label>
                        <input type="text" class="form-control" name="estado_civil" required maxlength="15" value="{{$personales->estado_civil}}">
                    </div>

                   




            
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Usuario</label>
                        <input type="text" class="form-control" name="name" required maxlength="50" value="{{$usuarios->name}}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" name="email" required maxlength="50" value="{{$usuarios->email}}">
                    </div>

                    
                    <div class="mb-3">
                        <label for="password" class="form-control">Password</label>
                        <input type="password" class="form-control" name="password" required maxlength="50" value="{{$usuarios->password}}">
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input type="reset"  class="btn btn-default" value="Cancelar">
                        <a href="javascript:history.back()">Ir al listado</a>
                    </div>
                    </form>
                </div>

            </div>     
        </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</x-app-layout>