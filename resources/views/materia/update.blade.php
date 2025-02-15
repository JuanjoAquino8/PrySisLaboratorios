@extends('app')
@section('content')
@include ('shared.navbar')
<div class="container">
    <h2>Actualizar Materia</h2>
    @if(isset($mensajes))
        <div class="alert alert-warning">
            {{ $mensajes }}
        </div>
    @endif   
    <h5>Los campos <span style="color:#FF0000";>*</span> son obligatorios</h5>
    <form action="{{url('/materia/update')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="MAT_CODIGO" value="{{ $materia->MAT_CODIGO }}">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="PER_CODIGO">Periodo <span style="color:#FF0000";>*</span></label>
                    <select class="form-control" id="PER_CODIGO" name="PER_CODIGO">
                        @foreach ($periodos as $per)
                            @if(isset($PER_CODIGO))
                                @if($per->PER_CODIGO == $PER_CODIGO)
                                <option value="{{$per->PER_CODIGO}}" selected>{{$per->PER_NOMBRE}}</option>
                                @else
                                <option value="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>      
                                @endif
                            @else
                                @if($per->PER_CODIGO == $materia->PER_CODIGO)
                                <option value="{{$per->PER_CODIGO}}" selected>{{$per->PER_NOMBRE}}</option>
                                @else
                                <option value="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>      
                               @endif
                            @endif
                        @endforeach
                    </select> 
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="DOC_CODIGO">Docente <span style="color:#FF0000";>*</span></label>
                    <select class="form-control" id="DOC_CODIGO" name="DOC_CODIGO">
                        @foreach ($docentes as $doc)
                            @if(isset($DOC_CODIGO))
                                @if($doc->DOC_CODIGO == $DOC_CODIGO)
                                <option value="{{$doc->DOC_CODIGO}}" selected>{{$doc->DOC_NOMBRES}}</option>
                                @else
                                <option value="{{$doc->DOC_CODIGO}}">{{$doc->DOC_NOMBRES}}</option>
                                @endif
                            @else
                                @if($doc->DOC_CODIGO == $materia->DOC_CODIGO)
                                <option value="{{$doc->DOC_CODIGO}}" selected>{{$doc->DOC_NOMBRES}}</option>
                                @else
                                <option value="{{$doc->DOC_CODIGO}}">{{$doc->DOC_NOMBRES}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="CAR_CODIGO">Carrera <span style="color:#FF0000";>*</span></label>
                    <select class="form-control" id="CAR_CODIGO" name="CAR_CODIGO" placeholder="CARRERA" >
                        @foreach ($carreras as $car)
                            @if(isset($CAR_CODIGO))
                                @if($car->CAR_CODIGO == $CAR_CODIGO)
                                <option value="{{$car->CAR_CODIGO}}" selected>{{$car->CAR_NOMBRE}}</option>
                                @else
                                <option value="{{$car->CAR_CODIGO}}"  >{{$car->CAR_NOMBRE}}</option>
                                @endif
                            @else 
                                @if($car->CAR_CODIGO == $materia->CAR_CODIGO)
                                <option value="{{$car->CAR_CODIGO}}" selected>{{$car->CAR_NOMBRE}}</option>
                                @else
                                <option value="{{$car->CAR_CODIGO}}"  >{{$car->CAR_NOMBRE}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select> 
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="MAT_CODIGO_BANNER">Codigo Banner </label>
                    @if(isset($MAT_CODIGO_BANNER))
                    <input type="text" class="form-control" id="MAT_CODIGO_BANNER" name="MAT_CODIGO_BANNER" value="{{$MAT_CODIGO_BANNER}}">
                    @else  
                    <input type="text" class="form-control" id="MAT_CODIGO_BANNER" name="MAT_CODIGO_BANNER" value="{{$materia->MAT_CODIGO_BANNER}}">
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="MAT_NRC">NRC <label style="color:#FF0000";>*</label></label>
                    @if(isset($MAT_NRC))
                    <input type="text" class="form-control" id="MAT_NRC" name="MAT_NRC" value="{{$MAT_NRC}}">
                    @else  
                    <input type="text" class="form-control" id="MAT_NRC" name="MAT_NRC" value="{{$materia->MAT_NRC}}">
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="MAT_NIVEL">Nivel</label>
                    @if(isset($MAT_NIVEL))
                    <input type="text" class="form-control" id="MAT_NIVEL" name="MAT_NIVEL" value="{{$MAT_NIVEL}}">
                    @else  
                    <input type="text" class="form-control" id="MAT_NIVEL" name="MAT_NIVEL" value="{{$materia->MAT_NIVEL}}">
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="MAT_NOMBRE">Nombre<label style="color:#FF0000";>*</label></label>
                    @if(isset($MAT_NOMBRE))
                    <input type="text" class="form-control" id="MAT_NOMBRE" name="MAT_NOMBRE" value="{{$MAT_NOMBRE}}">
                    @else  
                    <input type="text" class="form-control" id="MAT_NOMBRE" name="MAT_NOMBRE" value="{{$materia->MAT_NOMBRE}}">
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="MAT_CREDITOS">Créditos <label style="color:#FF0000";>*</label></label>
                    @if(isset($MAT_CREDITOS))
                    <input type="text" class="form-control" id="MAT_CREDITOS" name="MAT_CREDITOS" value="{{$MAT_CREDITOS}}">    
                    @else  
                    <input type="text" class="form-control" id="MAT_CREDITOS" name="MAT_CREDITOS" value="{{$materia->MAT_CREDITOS}}">  
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="MAT_NUM_EST">Número de estudiantes <label style="color:#FF0000";>*</label></label>
                    @if(isset($MAT_NUM_EST))
                    <input type="text" class="form-control" id="MAT_NUM_EST" name="MAT_NUM_EST" value="{{$MAT_NUM_EST}}">    
                    @else  
                    <input type="text" class="form-control" id="MAT_NUM_EST" name="MAT_NUM_EST" value="{{$materia->MAT_NUM_EST}}">
                    @endif    
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="MAT_ABREVIATURA">Abreviatura <label style="color:#FF0000";>*</label></label>
                    @if(isset($MAT_ABREVIATURA))
                    <input type="text" class="form-control" id="MAT_ABREVIATURA" name="MAT_ABREVIATURA" value="{{$MAT_ABREVIATURA}}">  
                    @else  
                    <input type="text" class="form-control" id="MAT_ABREVIATURA" name="MAT_ABREVIATURA" value="{{$materia->MAT_ABREVIATURA}}">  
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="MAT_OCACIONAL">Es ocasional </label>
                </div>
                @if(isset($MAT_OCACIONAL) && $MAT_OCACIONAL == "1" || $materia->MAT_OCACIONAL == "1")
                <div class="col" style="display: flex;align-items: center;">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="MAT_OCACIONAL" name="MAT_OCACIONAL" checked>
                        <label class="custom-control-label" for="MAT_OCACIONAL"></label>
                    </div>
                </div>
                @elseif(isset($MAT_OCACIONAL) && $MAT_OCACIONAL == "0" || $materia->MAT_OCACIONAL == "0")  
                <div class="col" style="display: flex;align-items: center;">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="MAT_OCACIONAL" name="MAT_OCACIONAL">
                        <label class="custom-control-label" for="MAT_OCACIONAL"></label>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
        <a href="{{url('materia')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection