<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Carrera;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CarreraController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$carreras = Carrera::All();
		return view('carrera.index', compact('carreras'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('carrera.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		Carrera::create([
			'CAR_CODIGO' => $request['CAR_CODIGO'],
			'CAR_NOMBRE' => $request['CAR_NOMBRE'],
			'CAR_ABREVIATURA' => $request['CAR_ABREVIATURA']
		]);
		return redirect('carrera')
			->with('title','Carrera creada!')
			->with('subtitle','Se ha creado correctamente la carrera.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$carrera = Carrera::find($id);
		return view('carrera.update', ['carrera' => $carrera]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$carrera = Carrera::find($request['CAR_CODIGO']);
		$carrera->fill($request->all());
		$carrera->save();
		return redirect('carrera')
			->with('title','Carrera actualizada!')
			->with('subtitle','Se han actualizado correctamente los datos de la carrera.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Carrera::destroy($id);
		return redirect('carrera')
			->with('title','Carrera eliminada!')
			->with('subtitle','Se ha eliminado correctamente la carrera.');
	}

}
