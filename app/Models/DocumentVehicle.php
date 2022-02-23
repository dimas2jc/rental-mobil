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
 * @property string $id_doc_vehicles
 * @property int|null $type_doc_vehicles
 * @property string|null $name_doc_vehicles
 * @property string|null $upload_doc_vehicles
 * @property Carbon|null $expired_doc_vehicles
 * @property string|null $description
 * 
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class DocumentVehicle extends Model
{
	protected $table = 'document_vehicles';
	protected $primaryKey = 'id_doc_vehicles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'type_doc_vehicles' => 'int'
	];

	protected $dates = [
		'expired_doc_vehicles'
	];

	protected $fillable = [
		'type_doc_vehicles',
		'name_doc_vehicles',
		'upload_doc_vehicles',
		'expired_doc_vehicles',
		'description'
	];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::class, 'id_doc_vehicles');
	}
}
