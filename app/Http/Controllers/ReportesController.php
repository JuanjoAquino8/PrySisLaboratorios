<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// aqui declaren todos los modelos que necesiten
use App\Horario;
use App\Materia;
use App\laboratorio;
use App\Periodo;
use App\Docente;
use App\Carrera;
use App\Control;
use App\Campus;
use PDF;
use DB;
use Illuminate\Http\Request;

class ReportesController extends Controller {


	public function hojaControl(Request $request)
	{
		$controles= $this->listar($request['CON_DIA'],$request['CAM_CODIGO']);
		$campus=DB::select('SELECT * FROM campus');
		return view('reportes.hojaControl', compact('controles','campus'));
	
	}

	public function listar($fecha,$campus){
		if($fecha==null){
			$fecha = getdate()["year"]."-".getdate()["mon"]."-".getdate()["mday"];
		}
        $controles = DB::select('SELECT @rownum:=@rownum+1 AS ORD, control.MAT_CODIGO,materia.MAT_ABREVIATURA,materia.MAT_NRC,laboratorio.LAB_NOMBRE,control.CON_HORA_ENTRADA,CON_HORA_SALIDA,docente.DOC_CODIGO, docente.DOC_NOMBRES, docente.DOC_APELLIDOS, docente.DOC_TITULO,empresa.EMP_NOMBRE,control.CON_EXTRA,control.CON_DIA,campus.CAM_CODIGO, materia.MAT_NUM_EST,laboratorio.LAB_CODIGO
		FROM (SELECT @rownum:=0) r, control,materia,laboratorio,docente,campus,empresa
		where laboratorio.EMP_CODIGO=empresa.EMP_CODIGO and control.MAT_CODIGO=materia.MAT_CODIGO and control.LAB_CODIGO=laboratorio.LAB_CODIGO and campus.CAM_CODIGO=laboratorio.CAM_CODIGO and materia.DOC_CODIGO=docente.DOC_CODIGO and control.CON_DIA="'.$fecha.'" and campus.CAM_CODIGO="'.$campus.'"
		order by control.CON_HORA_ENTRADA ASC;');
		return $controles;
	}



	public function horarioPorSalasIndex()
	{
		$periodos = Periodo::codigoNombre()->get();
		$laboratorios = Laboratorio::codigoNombreCapacidad()->get();
		
		return view('reportes.horarioSala', [
			'periodos' => $periodos->reverse(),
			'laboratorios' => $laboratorios
		]);
	}
	public function horarioPorSalasPost(Request $request)
	{
		$periodoId = $request->input('periodo');
		$laboratorioId = $request->input('laboratorio');
		$periodos = Periodo::codigoNombre()->get();
		$laboratorios = Laboratorio::codigoNombreCapacidad()->get();
		$count = Horario::obtenerHorario($periodoId, $laboratorioId)->count();
		$horario = Horario::obtenerHorario($periodoId, $laboratorioId)->first();
		$materias = Materia::reporte($periodoId)->get();
		for ($x = 1; $x <= 13; $x++) {
			foreach ($materias as $mat) {
				$docente = $mat->docente->DOC_TITULO.' '.$mat->docente->DOC_NOMBRES.' '.$mat->docente->DOC_APELLIDOS;
				if ($horario['HOR_LUNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_LUNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_LUNES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_MATES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MATES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MATES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_MIERCOLES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MIERCOLES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MIERCOLES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_JUEVES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_JUEVES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_JUEVES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_VIERNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_VIERNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_VIERNES_DOC'.$x] = $docente;
				}
			}
		}
		return view('reportes.horarioSala', [
			'periodos' => $periodos->reverse(),
			'laboratorios' => $laboratorios,
			'count' => $count,
			'horario' => $horario
		]);
	}

	public function pdf($per,$car)
	{ 
		 
        $materias=Materia::materiasx($per,$car)->get();

        $periodo=Periodo::find($per);
        $carrera=Carrera::find($car);

        $pdf = PDF::loadView('reportes.pdfmateriasxcarrera',['materias' => $materias , 'carrera' => $carrera, 'periodo'=>$periodo]);
        return $pdf->stream('MateriasporCarrera.pdf');

	}
	public function materiaPorCarrera()
	{
		$periodos = Periodo::codigoNombre()->get();
		$carreras = Carrera::codigoNombre()->get();

		$request=null;
		$materias=null;
		
		return view('reportes.materiaxcarrera', [
			'periodos' => $periodos,
			'carreras' => $carreras,
			'valores'=>$request,
			'materias'=>$materias
		]);
	}
	public function pdfcontrol(Request $request)
	{ 
		$controles= $this->listar($request['CON_DIA'],$request['CAM_CODIGO']);
		$pdf = PDF::loadView('reportes.pdfcontrol',compact('controles'))->setPaper('a4', 'landscape');
		
        return $pdf->stream('ReporteControl.pdf');
	}

    public function materiasPorCarreraPost(Request $request)
	{
		$periodos = Periodo::codigoNombre()->get();
		$carreras = Carrera::codigoNombre()->get();
	    $materias=Materia::materiasx($request['PER_CODIGO'],$request['CAR_CODIGO'])->get();
		
		return view('reportes.materiaxcarrera', [
			'periodos' => $periodos->reverse(),
			'carreras' => $carreras,
			'valores'=>$request,
			'materias'=>$materias
		]);
	}
	public function eventosOcasionalesIndex()
	{
		$periodos = Periodo::codigoNombre()->get();
		return view('reportes.eventos', [
			'periodos' => $periodos->reverse(),
		]);
	}
	public function eventosOcasionalesPost(Request $request)
	{
		$periodos= Periodo::All();
	   $carreras = Carrera::All();
	 return view('reportes.eventos', ['periodos' => $periodos])->with('materias',$materias);
   }
}
