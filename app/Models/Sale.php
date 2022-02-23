<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 * 
 * @property string $id_sales
 * @property string $name_sales
 * @property string $address_sales
 * @property float $phone_sales
 * @property bool $status_sales
 * 
 * @property Collection|Booking[] $bookings
 *
 * @package App\Models
 */
class Sale extends Model
{
	protected $table = 'sales';
	protected $primaryKey = 'id_sales';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'phone_sales' => 'float',
		'status_sales' => 'bool'
	];

	protected $fillable = [
		'name_sales',
		'address_sales',
		'phone_sales',
		'status_sales'
	];

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'id_sales');
	}
}
