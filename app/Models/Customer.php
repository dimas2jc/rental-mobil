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
 * @property string $id_custormer
 * @property string $no_kk_customer
 * @property string $name_customer
 * @property string $address_customer
 * @property float $phone_customer
 * @property string $email_customer
 * 
 * @property Collection|Booking[] $bookings
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'id_customer';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'phone_customer' => 'float'
	];

	protected $fillable = [
		'no_kk_customer',
		'name_customer',
		'address_customer',
		'phone_customer',
		'email_customer'
	];

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'id_customer');
	}
}
