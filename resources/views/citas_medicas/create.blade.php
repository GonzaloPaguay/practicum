

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nuevo Cliente') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>
<body>


<div class="container">
    <h1>Crear Cita Médica</h1>
    
    
    <form action="{{ route('citas_medicas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="enfermedad_id" class="form-label">Enfermedad</label>
            <select name="enfermedad_id" id="enfermedad_id" class="form-control">
                <option value="">Seleccionar</option>
                @foreach ($enfermedades as $enfermedad)
                    <option value="{{ $enfermedad->id }}">{{ $enfermedad->nombre }}</option>
                @endforeach
            </select>

                       
        </div>

        <div class="mb-3">

            <label for="doctor_id" class="form-label">Medico tratante</label>
            <select name="doctor_id" id="doctor_id" class="form-control">
                <option value="">Seleccionar</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>


        <input type="hidden" name="paciente_id" id="paciente_id" class="form-control" value="{{Auth::user()->id}}" required>

        <button type="submit" class="btn btn-success">Guardar</button>




    </form>
</div>

</body>
</x-app-layout>