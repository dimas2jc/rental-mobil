<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PriceVehicle
 * 
 * @property string $ID_VEHICLES
 * @property float $PRICE_VEHICLES
 * @property Carbon $TIME_RENT
 * 
 * @property Vehicle $vehicle
 *
 * @package App\Models
 */
class PriceVehicle extends Model
{
	protected $table = 'price_vehicles';
	protected $primaryKey = 'ID_VEHICLES';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PRICE_VEHICLES' => 'float'
	];

	protected $dates = [
		'TIME_RENT'
	];

	protected $fillable = [
		'PRICE_VEHICLES',
		'TIME_RENT'
	];

	public function vehicle()
	{
		return $this->hasOne(Vehicle::class, 'ID_VEHICLES');
	}
}
