@extends('app')
@section('content')
 <body >
        <div class="jumbotron">
                <h2>Crear Institucion</h2>
            </div>
        
            <div class="col">
                <div class="form-group">
                   <label for="INS_FIRMA_DIRECTOR">Firma Director*</label>
                    <input type="text" class="form-control"  name="INS_FIRMA_DIRECTOR" placeholder="Ingrese la firma de un director" required >
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="INS_PIE_DIRECTOR">Pie Director*</label>
                    <input type="text" class="form-control"  name="INS_PIE_DIRECTOR" placeholder="Ingrese un pie de director" required>
                </div>
            </div>
        
            <div class="col">
                <div class="form-group">
                    <label for="INS_PIE_DIRECTOR2">Pie Director*</label>
                    <input type="text" class="form-control"  name="INS_PIE_DIRECTOR2" placeholder="Ingrese un pie de director" required>
                </div>
            </div>
        </div>   
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="INS_AUX">Auxiliar*</label>
                    <input type="text"  class="form-control" name="INS_AUX" placeholder="Ingrese un axiliar" requireds>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        <a href="{{url('institucion')}}" class="btn btn-danger mb-2">Cancelar</a> 
    </form>
</div> 
@endsection