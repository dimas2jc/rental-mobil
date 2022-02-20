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
 * @property string $ID_VARIAN_VEHICLES
 * @property string $NAMA_VARIAN
 * @property string $VEHICLES_TYPE
 * @property string $VEHICLES_PABRIKAN
 * @property string $SILINDER
 * @property string $KAPASITAS_CC
 * @property string $TIPE_BBM
 * @property string $KAPASITAS_BBM
 * @property string $RASIO_BBM
 * @property string $JENIS_TRANSMISI
 * @property string $KONFIGURASI_AXLE
 * @property string $JUMLAH_SUMBU
 * @property string $UKURAN_BAN
 * @property string $VEHICLES_SIT
 * @property string $NOTE
 * 
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class VehiclesVarian extends Model
{
	protected $table = 'vehicles_varians';
	protected $primaryKey = 'ID_VARIAN_VEHICLES';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NAMA_VARIAN',
		'VEHICLES_TYPE',
		'VEHICLES_PABRIKAN',
		'SILINDER',
		'KAPASITAS_CC',
		'TIPE_BBM',
		'KAPASITAS_BBM',
		'RASIO_BBM',
		'JENIS_TRANSMISI',
		'KONFIGURASI_AXLE',
		'JUMLAH_SUMBU',
		'UKURAN_BAN',
		'VEHICLES_SIT',
		'NOTE'
	];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::class, 'ID_VARIAN_VEHICLES');
	}
}
