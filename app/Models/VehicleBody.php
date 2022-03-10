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
 * @property string $id_vehicle_bodies
 * @property string $name_vehicles_bodies
 * @property float $is_active
 *
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class VehicleBody extends Model
{
	protected $table = 'vehicle_bodies';
	protected $primaryKey = 'id_vehicle_bodies';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'is_active' => 'float'
	];

	protected $fillable = [
		'name_vehicles_bodies',
		'is_active',
        'id_vehicles'
	];

	public function vehicles()
	{
		return $this->belongsTo(Vehicle::class, 'id_vehicles');
	}
}
