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
 * @property string $ID_CHARGE_VEHICLES
 * @property string $NAME_CHARGE_VEHICLES
 * @property int $PRICE_CHARGE_VEHICLES
 * 
 * @property Collection|PaymentRent[] $payment_rents
 *
 * @package App\Models
 */
class ChargeRent extends Model
{
	protected $table = 'charge_rent';
	protected $primaryKey = 'ID_CHARGE_VEHICLES';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PRICE_CHARGE_VEHICLES' => 'int'
	];

	protected $fillable = [
		'NAME_CHARGE_VEHICLES',
		'PRICE_CHARGE_VEHICLES'
	];

	public function payment_rents()
	{
		return $this->hasMany(PaymentRent::class, 'ID_CHARGE_VEHICLES');
	}
}
