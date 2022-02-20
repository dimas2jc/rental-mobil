<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property string $ID_CUSTORMER
 * @property string $NO_KK_CUSTOMER
 * @property string $NAME_CUSTOMER
 * @property string $ADDRESS_CUSTOMER
 * @property string $PHONE_CUSTOMER
 * @property string $EMAIL_CUSTOMER
 * 
 * @property Collection|Booking[] $bookings
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'ID_CUSTORMER';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NO_KK_CUSTOMER',
		'NAME_CUSTOMER',
		'ADDRESS_CUSTOMER',
		'PHONE_CUSTOMER',
		'EMAIL_CUSTOMER'
	];

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'ID_CUSTORMER');
	}
}
