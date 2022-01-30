<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VehicleBody
 * 
 * @property string $ID_VEHICLE_BODIES
 * @property string $NAME_VEHICLES_BODIES
 * @property float $IS_ACTIVE
 * 
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class VehicleBody extends Model
{
	protected $table = 'vehicle_bodies';
	protected $primaryKey = 'ID_VEHICLE_BODIES';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IS_ACTIVE' => 'float'
	];

	protected $fillable = [
		'NAME_VEHICLES_BODIES',
		'IS_ACTIVE'
	];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::class, 'ID_VEHICLE_BODIES');
	}
}
