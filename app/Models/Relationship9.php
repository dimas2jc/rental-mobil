<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Relationship9
 * 
 * @property string $ID_BOOKING
 * @property string $ID_PAYMENT_RENT
 * 
 * @property PaymentRent $payment_rent
 * @property Booking $booking
 *
 * @package App\Models
 */
class Relationship9 extends Model
{
	protected $table = 'relationship_9';
	public $incrementing = false;
	public $timestamps = false;

	public function payment_rent()
	{
		return $this->belongsTo(PaymentRent::class, 'ID_PAYMENT_RENT');
	}

	public function booking()
	{
		return $this->belongsTo(Booking::class, 'ID_BOOKING');
	}
}
