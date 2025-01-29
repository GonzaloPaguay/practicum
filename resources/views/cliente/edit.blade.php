

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>





<body>
<div  class="container">
      
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">


                    <form action="{{route('cliente.update',$cliente->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="apellidos" class="form-control">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" required maxlength="50" value="{{$cliente->apellidos}}">

                    </div>
                    <div class="form-group">
                        <label for="nombre" class="form-control">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required maxlength="50" value="{{$cliente->nombre}}">
                    </div>
                    <div class="form-group">
                        <label for="documento" class="form-control">Documento</label>
                        <input type="text" class="form-control" name="documento" required maxlength="15" value="{{$cliente->documento}}">
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="form-control">Dirección</label>
                        <input type="text" class="form-control" name="direccion" required maxlength="100" value="{{$cliente->direccion}}">
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="form-control">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" required maxlength="15" value="{{$cliente->telefono}}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-control">Email</label>
                        <input type="text" class="form-control" name="email" required maxlength="50" value="{{$cliente->email}}">
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
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</x-app-layout>