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
 * @property string $id_vendors
 * @property string $name_vendrs
 * @property string $address_vendors
 * @property float $phone_vendors
 * @property string $email_vendors
 * 
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class Vendor extends Model
{
	protected $table = 'vendor';
	protected $primaryKey = 'id_vendors';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'phone_vendors' => 'float'
	];

	protected $fillable = [
		'name_vendrs',
		'address_vendors',
		'phone_vendors',
		'email_vendors'
	];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::class, 'id_vendors');
	}
}
