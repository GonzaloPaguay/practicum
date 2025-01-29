<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nuevo Cliente') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>
<body>
<div class="container">
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="col-x1-12">
                    <form action="{{route('cliente.store')}}" method="post">
                         @csrf
                        <div class="form-group">
                          <label for="apellidos" class="form-control">Apellidos</label>
                         <input type="text" class="form-control" name="apellidos" required maxlength="50">

                        </div>
                        <div class="form-group">
                             <label for="nombre" class="form-control">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="documento" class="form-control">Documento</label>
                             <input type="text" class="form-control" name="documento" required maxlength="15">
                        </div>
                        <div class="form-group">
                            <label for="direccion" class="form-control">Dirección</label>
                            <input type="text" class="form-control" name="direccion" required maxlength="100">
                        </div>
                        <div class="form-group">
                             <label for="telefono" class="form-control">Teléfono</label>
                             <input type="text" class="form-control" name="telefono" required maxlength="15">
                        </div>
                        <div class="form-group">
                           <label for="email" class="form-control">Email</label>
                           <input type="text" class="form-control" name="email" required maxlength="50">
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