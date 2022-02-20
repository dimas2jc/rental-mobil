<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentRent
 * 
 * @property string $ID_PAYMENT_RENT
 * @property string|null $ID_CHARGE_VEHICLES
 * @property int $TOTAL_PAYMENT
 * @property Carbon $DATE_PAYMENT
 * @property bool $STATUS_PAYMENT
 * 
 * @property ChargeRent|null $charge_rent
 * @property Collection|Relationship9[] $relationship9s
 *
 * @package App\Models
 */
class PaymentRent extends Model
{
	protected $table = 'payment_rent';
	protected $primaryKey = 'ID_PAYMENT_RENT';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TOTAL_PAYMENT' => 'int',
		'STATUS_PAYMENT' => 'bool'
	];

	protected $dates = [
		'DATE_PAYMENT'
	];

	protected $fillable = [
		'ID_CHARGE_VEHICLES',
		'TOTAL_PAYMENT',
		'DATE_PAYMENT',
		'STATUS_PAYMENT'
	];

	public function charge_rent()
	{
		return $this->belongsTo(ChargeRent::class, 'ID_CHARGE_VEHICLES');
	}

	public function relationship9s()
	{
		return $this->hasMany(Relationship9::class, 'ID_PAYMENT_RENT');
	}
}
