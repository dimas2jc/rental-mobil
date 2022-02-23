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
 * @property string $id_vehicles
 * @property string|null $id_varian_vehicles
 * @property string|null $id_vendors
 * @property string|null $id_vehicle_bodies
 * @property string|null $id_doc_vehicles
 * @property string|null $nopol
 * @property string|null $no_rangka
 * @property string|null $nomesin
 * @property string|null $warna
 * @property string|null $tahun_pembuatan
 * @property string|null $no_stnk
 * @property string|null $nama_stnk
 * @property string|null $masa_sntk
 * @property string|null $alamat_sntk
 * @property string|null $no_bpkb
 * @property string|null $tgl_kir
 * 
 * @property Vendor|null $vendor
 * @property VehiclesVarian|null $vehicles_varian
 * @property DocumentVehicle|null $document_vehicle
 * @property VehicleBody|null $vehicle_body
 * @property Collection|Booking[] $bookings
 * @property Collection|PriceVehicle[] $price_vehicles
 *
 * @package App\Models
 */
class Vehicle extends Model
{
	protected $table = 'vehicles';
	protected $primaryKey = 'id_vehicles';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'id_varian_vehicles',
		'id_vendors',
		'id_vehicle_bodies',
		'id_doc_vehicles',
		'nopol',
		'no_rangka',
		'nomesin',
		'warna',
		'tahun_pembuatan',
		'no_stnk',
		'nama_stnk',
		'masa_sntk',
		'alamat_sntk',
		'no_bpkb',
		'tgl_kir'
	];

	public function vendor()
	{
		return $this->belongsTo(Vendor::class, 'id_vendors');
	}

	public function vehicles_varian()
	{
		return $this->belongsTo(VehiclesVarian::class, 'id_varian_vehicles');
	}

	public function document_vehicle()
	{
		return $this->belongsTo(DocumentVehicle::class, 'id_doc_vehicles');
	}

	public function vehicle_body()
	{
		return $this->belongsTo(VehicleBody::class, 'id_vehicle_bodies');
	}

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'id_vehicles');
	}

	public function price_vehicles()
	{
		return $this->hasMany(PriceVehicle::class, 'id_vehicles');
	}
}
