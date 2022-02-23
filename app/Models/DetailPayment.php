<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPayment
 * 
 * @property string $id_booking
 * @property string $id_payment_rent
 * @property int $price
 * @property string|null $description
 * @property Carbon $timestamps
 * 
 * @property PaymentRent $payment_rent
 * @property Booking $booking
 *
 * @package App\Models
 */
class DetailPayment extends Model
{
	protected $table = 'detail_payment';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'price' => 'int'
	];

	protected $dates = [
		'timestamps'
	];

	protected $fillable = [
		'description',
		'timestamps'
	];

	public function payment_rent()
	{
		return $this->belongsTo(PaymentRent::class, 'id_payment_rent');
	}

	public function booking()
	{
		return $this->belongsTo(Booking::class, 'id_booking');
	}
}
