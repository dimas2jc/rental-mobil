<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentVehicle
 * 
 * @property string $ID_DOC_VEHICLES
 * @property int $TYPE_DOC_VEHICLES
 * @property string $NAME_DOC_VEHICLES
 * @property string $UPLOAD_DOC_VEHICLES
 * @property Carbon $EXPIRED_DOC_VEHICLES
 * @property string $DESCRIPTION
 * 
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class DocumentVehicle extends Model
{
	protected $table = 'document_vehicles';
	protected $primaryKey = 'ID_DOC_VEHICLES';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TYPE_DOC_VEHICLES' => 'int'
	];

	protected $dates = [
		'EXPIRED_DOC_VEHICLES'
	];

	protected $fillable = [
		'TYPE_DOC_VEHICLES',
		'NAME_DOC_VEHICLES',
		'UPLOAD_DOC_VEHICLES',
		'EXPIRED_DOC_VEHICLES',
		'DESCRIPTION'
	];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::class, 'ID_DOC_VEHICLES');
	}
}
