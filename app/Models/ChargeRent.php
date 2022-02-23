<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChargeRent
 * 
 * @property string $id_charge_vehicles
 * @property string $name_charge_vehicles
 * @property int $price_charge_vehicles
 * 
 * @property Collection|PaymentRent[] $payment_rents
 *
 * @package App\Models
 */
class ChargeRent extends Model
{
	protected $table = 'charge_rent';
	protected $primaryKey = 'id_charge_vehicles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'price_charge_vehicles' => 'int'
	];

	protected $fillable = [
		'name_charge_vehicles',
		'price_charge_vehicles'
	];

	public function payment_rents()
	{
		return $this->hasMany(PaymentRent::class, 'id_charge_vehicles');
	}
}
