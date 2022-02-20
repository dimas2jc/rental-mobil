<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PriceVehicle
 * 
 * @property string $ID_PRICE_VEHICLES
 * @property float $PRICE_VEHICLES
 * @property int $TIME_RENT
 * 
 * @property Collection|Relationship7[] $relationship7s
 *
 * @package App\Models
 */
class PriceVehicle extends Model
{
	protected $table = 'price_vehicles';
	protected $primaryKey = 'ID_PRICE_VEHICLES';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PRICE_VEHICLES' => 'float',
		'TIME_RENT' => 'int'
	];

	protected $fillable = [
		'PRICE_VEHICLES',
		'TIME_RENT'
	];

	public function relationship7s()
	{
		return $this->hasMany(Relationship7::class, 'ID_PRICE_VEHICLES');
	}
}
