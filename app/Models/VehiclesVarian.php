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
 * @property string $ID_BODY_VEHICLES
 * 
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class VehiclesVarian extends Model
{
	protected $table = 'vehicles_varians';
	protected $primaryKey = 'ID_BODY_VEHICLES';
	public $incrementing = false;
	public $timestamps = false;

	public function vehicles()
	{
		return $this->hasMany(Vehicle::class, 'ID_BODY_VEHICLES');
	}
}
