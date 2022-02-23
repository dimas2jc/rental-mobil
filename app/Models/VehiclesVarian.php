<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VehiclesVarian
 * 
 * @property string $id_varian_vehicles
 * @property string|null $nama_varian
 * @property string|null $vehicles_type
 * @property string|null $vehicles_pabrikan
 * @property string|null $silinder
 * @property string|null $kapasitas_cc
 * @property string|null $tipe_bbm
 * @property string|null $kapasitas_bbm
 * @property string|null $rasio_bbm
 * @property string|null $jenis_transmisi
 * @property string|null $konfigurasi_axle
 * @property string|null $jumlah_sumbu
 * @property string|null $ukuran_ban
 * @property string|null $vehicles_sit
 * @property string|null $note
 * 
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class VehiclesVarian extends Model
{
	protected $table = 'vehicles_varians';
	protected $primaryKey = 'id_varian_vehicles';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nama_varian',
		'vehicles_type',
		'vehicles_pabrikan',
		'silinder',
		'kapasitas_cc',
		'tipe_bbm',
		'kapasitas_bbm',
		'rasio_bbm',
		'jenis_transmisi',
		'konfigurasi_axle',
		'jumlah_sumbu',
		'ukuran_ban',
		'vehicles_sit',
		'note'
	];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::class, 'id_varian_vehicles');
	}
}
