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
 * @property string $id_payment_rent
 * @property string|null $id_charge_vehicles
 * @property int $total_payment
 * @property Carbon $date_payment
 * @property bool $status_payment
 * 
 * @property ChargeRent|null $charge_rent
 * @property Collection|DetailPayment[] $detail_payments
 *
 * @package App\Models
 */
class PaymentRent extends Model
{
	protected $table = 'payment_rent';
	protected $primaryKey = 'id_payment_rent';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_payment' => 'int',
		'status_payment' => 'bool'
	];

	protected $dates = [
		'date_payment'
	];

	protected $fillable = [
		'id_charge_vehicles',
		'total_payment',
		'date_payment',
		'status_payment'
	];

	public function charge_rent()
	{
		return $this->belongsTo(ChargeRent::class, 'id_charge_vehicles');
	}

	public function detail_payments()
	{
		return $this->hasMany(DetailPayment::class, 'id_payment_rent');
	}
}
