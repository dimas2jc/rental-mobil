<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentRent
 * 
 * @property string $ID_PAYMENT_RENT
 * @property string|null $ID_CHARGE_VEHICLES
 * @property string|null $ID_BOOKING
 * @property int|null $COMMISION_SALES
 * @property int $TOTAL_PAYMENT
 * @property Carbon $DATE_PAYMENT
 * 
 * @property ChargeRent|null $charge_rent
 * @property Booking|null $booking
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
		'COMMISION_SALES' => 'int',
		'TOTAL_PAYMENT' => 'int'
	];

	protected $dates = [
		'DATE_PAYMENT'
	];

	protected $fillable = [
		'ID_CHARGE_VEHICLES',
		'ID_BOOKING',
		'COMMISION_SALES',
		'TOTAL_PAYMENT',
		'DATE_PAYMENT'
	];

	public function charge_rent()
	{
		return $this->belongsTo(ChargeRent::class, 'ID_CHARGE_VEHICLES');
	}

	public function booking()
	{
		return $this->belongsTo(Booking::class, 'ID_BOOKING');
	}
}
