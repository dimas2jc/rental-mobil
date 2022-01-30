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
 * @property string|null $ID_VENDORS
 * @property string|null $ID_DOC_VEHICLES
 * @property string|null $ID_VEHICLE_BODIES
 * @property string|null $ID_BODY_VEHICLES
 * 
 * @property Vendor|null $vendor
 * @property VehiclesVarian|null $vehicles_varian
 * @property DocumentVehicle|null $document_vehicle
 * @property VehicleBody|null $vehicle_body
 * @property PriceVehicle $price_vehicle
 * @property Collection|Booking[] $bookings
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
		'ID_VENDORS',
		'ID_DOC_VEHICLES',
		'ID_VEHICLE_BODIES',
		'ID_BODY_VEHICLES'
	];

	public function vendor()
	{
		return $this->belongsTo(Vendor::class, 'ID_VENDORS');
	}

	public function vehicles_varian()
	{
		return $this->belongsTo(VehiclesVarian::class, 'ID_BODY_VEHICLES');
	}

	public function document_vehicle()
	{
		return $this->belongsTo(DocumentVehicle::class, 'ID_DOC_VEHICLES');
	}

	public function vehicle_body()
	{
		return $this->belongsTo(VehicleBody::class, 'ID_VEHICLE_BODIES');
	}

	public function price_vehicle()
	{
		return $this->belongsTo(PriceVehicle::class, 'ID_VEHICLES');
	}

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'ID_VEHICLES');
	}
}
