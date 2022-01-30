<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property string $ID_CLIENT
 * @property string $NAME_CLIENT
 * @property string $ADDRESS_CLIENT
 * @property float $PHONE_CLIENT
 * @property string $EMAIL_CLIENT
 * 
 * @property Collection|Booking[] $bookings
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'client';
	protected $primaryKey = 'ID_CLIENT';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PHONE_CLIENT' => 'float'
	];

	protected $fillable = [
		'NAME_CLIENT',
		'ADDRESS_CLIENT',
		'PHONE_CLIENT',
		'EMAIL_CLIENT'
	];

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'ID_CLIENT');
	}
}
