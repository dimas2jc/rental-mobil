<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vendor
 * 
 * @property string $ID_VENDORS
 * @property string $NAME_VENDRS
 * @property string $ADDRESS_VENDORS
 * @property string $PHONE_VENDORS
 * @property string $EMAIL_VENDORS
 * 
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class Vendor extends Model
{
	protected $table = 'vendor';
	protected $primaryKey = 'ID_VENDORS';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NAME_VENDRS',
		'ADDRESS_VENDORS',
		'PHONE_VENDORS',
		'EMAIL_VENDORS'
	];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::class, 'ID_VENDORS');
	}
}
