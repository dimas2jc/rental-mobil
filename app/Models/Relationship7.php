<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Relationship7
 * 
 * @property string $ID_PRICE_VEHICLES
 * @property string $ID_VEHICLES
 * 
 * @property PriceVehicle $price_vehicle
 * @property Vehicle $vehicle
 *
 * @package App\Models
 */
class Relationship7 extends Model
{
	protected $table = 'relationship_7';
	public $incrementing = false;
	public $timestamps = false;

	public function price_vehicle()
	{
		return $this->belongsTo(PriceVehicle::class, 'ID_PRICE_VEHICLES');
	}

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class, 'ID_VEHICLES');
	}
}
