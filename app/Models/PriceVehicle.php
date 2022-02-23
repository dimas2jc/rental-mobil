<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PriceVehicle
 * 
 * @property string $id_price_vehicles
 * @property string|null $id_vehicles
 * @property float $price_vehicles
 * @property int $time_rent
 * 
 * @property Vehicle|null $vehicle
 *
 * @package App\Models
 */
class PriceVehicle extends Model
{
	protected $table = 'price_vehicles';
	protected $primaryKey = 'id_price_vehicles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'price_vehicles' => 'float',
		'time_rent' => 'int'
	];

	protected $fillable = [
		'id_vehicles',
		'price_vehicles',
		'time_rent'
	];

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class, 'id_vehicles');
	}
}
