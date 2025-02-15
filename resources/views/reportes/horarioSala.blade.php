@extends('app')
@section('content')
<div class="container">
    <h2>Horario por salas</h2>
    <div class="row">
        <div class="col">
            <form action="{{url('/reporte/horario/sala')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card border-primary mb-3">
                    <div class="card-header text-primary">Consultar</div>
                    <div class="card-body text-primary">
                        <select class="selectpicker show-tick mb-3" title="Seleccione un Periodo..." name="periodo" data-live-search="true" data-width="100%">
                            @foreach ($periodos as $periodo)
                            <option value="{{ $periodo->PER_CODIGO }}">{{ $periodo->PER_NOMBRE }}</option>
                            @endforeach
                        </select>
                        <select class="selectpicker show-tick mb-3" title="Seleccione una Sala..." name="laboratorio" data-live-search="true" data-width="100%">
                            @foreach ($laboratorios as $laboratorio)
                            <option value="{{ $laboratorio->LAB_CODIGO }}">{{ $laboratorio->LAB_NOMBRE }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary"><span class="oi oi-magnifying-glass"></span> Consultar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col">
            <div class="card border-info mb-3">
                <div class="card-header text-info">Opciones</div>
                <div class="card-body text-info">
                    <form>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h5 class="card-title">Incluir Horas Ocasionales</h5>
                        <div class="custom-control custom-radio">
                            @if (isset($horario))
                            <input type="radio" class="custom-control-input" id="colorFondo" name="opts" onChange="changeBackground()">
                            @else
                            <input disabled type="radio" class="custom-control-input" id="colorFondo" name="opts" onChange="changeBackground()">
                            @endif
                            <label class="custom-control-label" for="colorFondo">Fondo Gris</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            @if (isset($horario))
                            <input type="radio" class="custom-control-input" id="textoFondo" name="opts" onChange="changeText()">
                            @else
                            <input disabled type="radio" class="custom-control-input" id="textoFondo" name="opts" onChange="changeText()">
                            @endif
                            <label class="custom-control-label" for="textoFondo">Texto (O)</label>
                        </div>
                    </form>
                    @if (isset($horario))
                    <button onclick="exportHorarioSala()" class="btn btn-info"><span class="oi oi-cloud-download"></span> Exportar PDF</button>
                    @else
                    <button disabled onclick="exportHorarioSala()" class="btn btn-info"><span class="oi oi-cloud-download"></span> Exportar PDF</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- horario -->
    @if (isset($count) && $count === 1)
    <p id="sala">
        <span class="h4">SALA: &emsp;
            <span style="font-weight: 300;">{{ $horario->laboratorio->LAB_NOMBRE }}</span>
        </span>
        <br>
        <span class="h6" style="margin-right:150px;">PERIODO: &emsp;
            <span style="font-weight: 300;">{{ $horario->periodo->PER_NOMBRE }}</span>
        </span>
        <span class="h6">CAPACIDAD: &emsp;
            <span style="font-weight: 300;">{{ $horario->laboratorio->LAB_CAPACIDAD }} PCs</span>
        </span>
    </p>
    <table id="horarioSalaTable" class="table table-hover table-bordered table-sm">
        <thead>
            <tr class="d-flex">
                <th class="col">HORA</th>
                <th class="col">LUNES</th>
                <th class="col">MARTES</th>
                <th class="col">MIERCOLES</th>
                <th class="col">JUEVES</th>
                <th class="col">VIERNES</th>
            </tr>
        </thead>
        <tbody>
            @for ($x = 1; $x <= 13; $x++)
            <tr class="d-flex">
                <td class="col">{{ $horario['HOR_HORA'.$x] }}</td>
                <td class="col opts">
                    @if ($horario['HOR_LUNES'.$x] != 0 || $horario['HOR_LUNES'.$x] != NULL)
                    {{ $horario['HOR_LUNES'.$x] }} <span class="text-{{ $horario['HOR_LUNES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_LUNES_DOC'.$x] }}</b>
                    @endif
                </td>
                <td class="col opts">
                    @if ($horario['HOR_MATES'.$x] != 0 || $horario['HOR_MATES'.$x] != NULL)
                    {{ $horario['HOR_MATES'.$x] }} <span class="text-{{ $horario['HOR_MARTES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_MATES_DOC'.$x] }}</b>
                    @endif
                </td>
                <td class="col opts">
                    @if ($horario['HOR_MIERCOLES'.$x] != 0 || $horario['HOR_MIERCOLES'.$x] != NULL)
                    {{ $horario['HOR_MIERCOLES'.$x] }} <span class="text-{{ $horario['HOR_MIERCOLES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_MIERCOLES_DOC'.$x] }}</b>
                    @endif
                </td>
                <td class="col opts">
                    @if ($horario['HOR_JUEVES'.$x] != 0 || $horario['HOR_JUEVES'.$x] != NULL)
                    {{ $horario['HOR_JUEVES'.$x] }} <span class="text-{{ $horario['HOR_JUEVES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_JUEVES_DOC'.$x] }}</b>
                    @endif
                </td>
                <td class="col opts">
                    @if ($horario['HOR_VIERNES'.$x] != 0 || $horario['HOR_VIERNES'.$x] != NULL)
                    {{ $horario['HOR_VIERNES'.$x] }} <span class="text-{{ $horario['HOR_VIERNES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_VIERNES_DOC'.$x] }}</b>
                    @endif
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
    @elseif (isset($count) && $count === 0)
    <div class="alert alert-warning" role="alert">
        No existen registros de horarios para esta sala 
    </div>
    @endif
</div>

@endsection