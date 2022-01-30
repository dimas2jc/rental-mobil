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
 * @property string $ID_SALES
 * @property string $NAME_SALES
 * @property string $ADDRESS_SALES
 * @property float $PHONE_SALES
 * 
 * @property Collection|Booking[] $bookings
 *
 * @package App\Models
 */
class Sale extends Model
{
	protected $table = 'sales';
	protected $primaryKey = 'ID_SALES';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PHONE_SALES' => 'float'
	];

	protected $fillable = [
		'NAME_SALES',
		'ADDRESS_SALES',
		'PHONE_SALES'
	];

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'ID_SALES');
	}
}
