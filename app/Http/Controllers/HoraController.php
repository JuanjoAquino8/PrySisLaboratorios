<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Hora;
use App\Empresa;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class HoraController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$hora=Hora::all();
		return view("hora.index", ["horas"=>$hora]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$empresas=empresa::all();
		return view('hora.create',["empresas"=>$empresas]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		Hora::create([
			'EMP_CODIGO' => $request['EMP_CODIGO'],
			'HORA_NOMBRE' => $request['HORA_NOMBRE'],
		]);

		return redirect('hora')
			->with('title','Hora creada!')
			->with('subtitle','Se ha creado correctamente la hora.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	public function search(Request $request)
	{
	
		return redirect('hora');
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hora =	Hora::find($id);
		$empresas=empresa::all();
		return view("hora.update", ["hora"=>$hora,"empresas"=>$empresas]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$hora =	Hora::find( $request['HORA_CODIGO']);
		$hora->fill($request->all());
		$hora->save();
		return redirect('hora')
			->with('title','Hora actualizada!')
			->with('subtitle','Se han actualizado correctamente los datos de la hora.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Hora::destroy($id);
		return redirect('hora')
			->with('title','Hora eliminada!')
			->with('subtitle','Se ha eliminado correctamente la hora.');
	}

}
