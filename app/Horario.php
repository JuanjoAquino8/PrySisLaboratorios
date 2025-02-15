<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {
	protected $table = 'horario';
	protected $primaryKey = 'HOR_CODIGO';
	protected $fillable = [
		'LAB_CODIGO',
		'PER_CODIGO',
		'HOR_HORA1',
		'HOR_HORA2',
		'HOR_HORA3',
		'HOR_HORA4',
		'HOR_HORA5',
		'HOR_HORA6',
		'HOR_HORA7',
		'HOR_HORA8',
		'HOR_HORA9',
		'HOR_HORA10',
		'HOR_HORA11',
		'HOR_HORA12',
		'HOR_HORA13',
		'HOR_LUNES1',
		'HOR_LUNES2',
		'HOR_LUNES3',
		'HOR_LUNES4',
		'HOR_LUNES5',
		'HOR_LUNES6',
		'HOR_LUNES7',
		'HOR_LUNES8',
		'HOR_LUNES9',
		'HOR_LUNES10',
		'HOR_LUNES11',
		'HOR_LUNES12',
		'HOR_LUNES13',
		'HOR_MATES1',
		'HOR_MATES2',
		'HOR_MATES3',
		'HOR_MATES4',
		'HOR_MATES5',
		'HOR_MATES6',
		'HOR_MATES7',
		'HOR_MATES8',
		'HOR_MATES9',
		'HOR_MATES10',
		'HOR_MATES11',
		'HOR_MATES12',
		'HOR_MATES13',
		'HOR_MIERCOLES1',
		'HOR_MIERCOLES2',
		'HOR_MIERCOLES3',
		'HOR_MIERCOLES4',
		'HOR_MIERCOLES5',
		'HOR_MIERCOLES6',
		'HOR_MIERCOLES7',
		'HOR_MIERCOLES8',
		'HOR_MIERCOLES9',
		'HOR_MIERCOLES10',
		'HOR_MIERCOLES11',
		'HOR_MIERCOLES12',
		'HOR_MIERCOLES13',
		'HOR_JUEVES1',
		'HOR_JUEVES2',
		'HOR_JUEVES3',
		'HOR_JUEVES4',
		'HOR_JUEVES5',
		'HOR_JUEVES6',
		'HOR_JUEVES7',
		'HOR_JUEVES8',
		'HOR_JUEVES9',
		'HOR_JUEVES10',
		'HOR_JUEVES11',
		'HOR_JUEVES12',
		'HOR_JUEVES13',
		'HOR_VIERNES1',
		'HOR_VIERNES2',
		'HOR_VIERNES3',
		'HOR_VIERNES4',
		'HOR_VIERNES5',
		'HOR_VIERNES6',
		'HOR_VIERNES7',
		'HOR_VIERNES8',
		'HOR_VIERNES9',
		'HOR_VIERNES10',
		'HOR_VIERNES11',
		'HOR_VIERNES12',
		'HOR_VIERNES13',
		'HOR_LUNES1_OPC',
		'HOR_LUNES2_OPC',
		'HOR_LUNES3_OPC',
		'HOR_LUNES4_OPC',
		'HOR_LUNES5_OPC',
		'HOR_LUNES6_OPC',
		'HOR_LUNES7_OPC',
		'HOR_LUNES8_OPC',
		'HOR_LUNES9_OPC',
		'HOR_LUNES10_OPC',
		'HOR_LUNES11_OPC',
		'HOR_LUNES12_OPC',
		'HOR_LUNES13_OPC',
		'HOR_MARTES1_OPC',
		'HOR_MARTES2_OPC',
		'HOR_MARTES3_OPC',
		'HOR_MARTES4_OPC',
		'HOR_MARTES5_OPC',
		'HOR_MARTES6_OPC',
		'HOR_MARTES7_OPC',
		'HOR_MARTES8_OPC',
		'HOR_MARTES9_OPC',
		'HOR_MARTES10_OPC',
		'HOR_MARTES11_OPC',
		'HOR_MARTES12_OPC',
		'HOR_MARTES13_OPC',
		'HOR_MIERCOLES1_OPC',
		'HOR_MIERCOLES2_OPC',
		'HOR_MIERCOLES3_OPC',
		'HOR_MIERCOLES4_OPC',
		'HOR_MIERCOLES5_OPC',
		'HOR_MIERCOLES6_OPC',
		'HOR_MIERCOLES7_OPC',
		'HOR_MIERCOLES8_OPC',
		'HOR_MIERCOLES9_OPC',
		'HOR_MIERCOLES10_OPC',
		'HOR_MIERCOLES11_OPC',
		'HOR_MIERCOLES12_OPC',
		'HOR_MIERCOLES13_OPC',
		'HOR_JUEVES1_OPC',
		'HOR_JUEVES2_OPC',
		'HOR_JUEVES3_OPC',
		'HOR_JUEVES4_OPC',
		'HOR_JUEVES5_OPC',
		'HOR_JUEVES6_OPC',
		'HOR_JUEVES7_OPC',
		'HOR_JUEVES8_OPC',
		'HOR_JUEVES9_OPC',
		'HOR_JUEVES10_OPC',
		'HOR_JUEVES11_OPC',
		'HOR_JUEVES12_OPC',
		'HOR_JUEVES13_OPC',
		'HOR_VIERNES1_OPC',
		'HOR_VIERNES2_OPC',
		'HOR_VIERNES3_OPC',
		'HOR_VIERNES4_OPC',
		'HOR_VIERNES5_OPC',
		'HOR_VIERNES6_OPC',
		'HOR_VIERNES7_OPC',
		'HOR_VIERNES8_OPC',
		'HOR_VIERNES9_OPC',
		'HOR_VIERNES10_OPC',
		'HOR_VIERNES11_OPC',
		'HOR_VIERNES12_OPC',
		'HOR_VIERNES13_OPC'
	];
	public $timestamps = false;

	public function periodo() {
		return $this->belongsTo('App\Periodo', 'PER_CODIGO');
	}

	public function laboratorio() {
		return $this->belongsTo('App\Laboratorio', 'LAB_CODIGO');
	}

	public function scopeObtenerHorario($query, $periodoId, $laboratorioId)
	{
		return $query->where('PER_CODIGO', $periodoId)
			->where('LAB_CODIGO', $laboratorioId);
	}
}
