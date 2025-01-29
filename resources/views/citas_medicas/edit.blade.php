
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Citas Médicas') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>



<div class="container">
  
    <form action="{{ route('citas_medicas.update', '$citaMedica->id') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $citaMedica->fecha }}" required>
            <input type="hidden" name="paciente_id" id="paciente_id" class="form-control" value="{{ $citaMedica->paciente_id }}" required>    
            <input type="hidden" name="cita_id" id="cita_id" class="form-control" value="{{ $citaMedica->id }}" required>    
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control" value="{{ $citaMedica->hora }}" required>

        </div>


        <div class="mb-3">
            <label for="enfermedad_id" class="form-label">Enfermedad</label>
            <select name="enfermedad_id" id="enfermedad_id" class="form-control">
                <option value="">Seleccionar</option>
                @foreach ($enfermedades as $enfermedad)
                    <option value="{{ $enfermedad->id }}" {{ $citaMedica->enfermedad_id == $enfermedad->id ? 'selected' : '' }}>
                        {{ $enfermedad->nombre }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="doctor_id" class="form-label">Medico Tratante</label>
            <select name="doctor_id" id="doctor_id" class="form-control">
                <option value="">Seleccionar</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $citaMedica->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->nombres . " " . $doctor->apellidos  }}
                    </option>
                @endforeach
            </select>
        </div>

        

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</x-app-layout>