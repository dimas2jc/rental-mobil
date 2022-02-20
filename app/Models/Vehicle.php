<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehicle
 * 
 * @property string $ID_VEHICLES
 * @property string|null $ID_VARIAN_VEHICLES
 * @property string|null $ID_VENDORS
 * @property string|null $ID_VEHICLE_BODIES
 * @property string|null $ID_DOC_VEHICLES
 * @property string $NOPOL
 * @property string $NO_RANGKA
 * @property string $NOMESIN
 * @property string $WARNA
 * @property string $TAHUN_PEMBUATAN
 * @property string $NO_STNK
 * @property string $NAMA_STNK
 * @property string $MASA_SNTK
 * @property string $ALAMAT_SNTK
 * @property string $NO_BPKB
 * @property string $TGL_KIR
 * 
 * @property Vendor|null $vendor
 * @property VehiclesVarian|null $vehicles_varian
 * @property DocumentVehicle|null $document_vehicle
 * @property VehicleBody|null $vehicle_body
 * @property Collection|Booking[] $bookings
 * @property Collection|Relationship7[] $relationship7s
 *
 * @package App\Models
 */
class Vehicle extends Model
{
	protected $table = 'vehicles';
	protected $primaryKey = 'ID_VEHICLES';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'ID_VARIAN_VEHICLES',
		'ID_VENDORS',
		'ID_VEHICLE_BODIES',
		'ID_DOC_VEHICLES',
		'NOPOL',
		'NO_RANGKA',
		'NOMESIN',
		'WARNA',
		'TAHUN_PEMBUATAN',
		'NO_STNK',
		'NAMA_STNK',
		'MASA_SNTK',
		'ALAMAT_SNTK',
		'NO_BPKB',
		'TGL_KIR'
	];

	public function vendor()
	{
		return $this->belongsTo(Vendor::class, 'ID_VENDORS');
	}

	public function vehicles_varian()
	{
		return $this->belongsTo(VehiclesVarian::class, 'ID_VARIAN_VEHICLES');
	}

	public function document_vehicle()
	{
		return $this->belongsTo(DocumentVehicle::class, 'ID_DOC_VEHICLES');
	}

	public function vehicle_body()
	{
		return $this->belongsTo(VehicleBody::class, 'ID_VEHICLE_BODIES');
	}

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'ID_VEHICLES');
	}

	public function relationship7s()
	{
		return $this->hasMany(Relationship7::class, 'ID_VEHICLES');
	}
}
