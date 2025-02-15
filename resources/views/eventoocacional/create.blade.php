@extends('app')
@section('content')

<div class="jumbotron">
    <h2>Crear Hora Evento Ocasional</h2>
</div>
<div class="container">
    <form action="{{url('/eventoocacional/store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="LAB_CODIGO">Sala</label>
                    <select type="input" class="form-control" id="LAB_CODIGO" name="LAB_CODIGO" placeholder="Laboratorio"  required>
                        @foreach ($laboratorios as $laboratorio)
                            <option value="{{$laboratorio->LAB_CODIGO}}">{{$laboratorio->LAB_NOMBRE}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="MAT_CODIGO">Materia</label>
                    <select type="input" class="form-control" id="MAT_CODIGO" name="MAT_CODIGO" placeholder="Materia"  required>
                        @foreach ($materias as $materia)
                            <option value="{{$materia->MAT_CODIGO}}">{{$materia->MAT_NOMBRE}}</option>
                        @endforeach
                    </select> 
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col">
                <div class="form-group">
                    <label for="DOC_CODIGO">Docente</label>
                    <select type="input" class="form-control" id="DOC_CODIGO" name="DOC_CODIGO" placeholder="Docente"  required>
                        @foreach ($docentes as $docente)
                            <option value="{{$docente->DOC_CODIGO}}">{{$docente->DOC_NOMBRES}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="CON_DIA">Dia</label>
                        <input type="date" class="form-control" id="CON_DIA" name="CON_DIA" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="CON_HORA_ENTRADA">Hora Entrada</label>
                    <input type="time" class="form-control" id="CON_HORA_ENTRADA" name="CON_HORA_ENTRADA" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="CON_HORA_SALIDA">Hora Salida</label>
                    <input type="time" class="form-control" id="CON_HORA_SALIDA" name="CON_HORA_SALIDA" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="CON_NUMERO_HORAS">Numero Horas</label>
                    <input type="number" class="form-control" id="CON_NUMERO_HORAS" name="CON_NUMERO_HORAS" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="CON_NOTA">Nota</label>
                    <input type="text" class="form-control" id="CON_NOTA" name="CON_NOTA">
                </div>
            </div>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        <a href="{{url('eventoocacional')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection