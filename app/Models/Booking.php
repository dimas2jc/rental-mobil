<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 * 
 * @property string $ID_BOOKING
 * @property string|null $ID_CLIENT
 * @property string|null $ID_VEHICLES
 * @property string|null $ID_EMPLOYES
 * @property string|null $ID_SALES
 * @property Carbon $DATE_START
 * @property Carbon $DATE_FINISH
 * 
 * @property Sale|null $sale
 * @property EmployesCompany|null $employes_company
 * @property Client|null $client
 * @property Vehicle|null $vehicle
 * @property Collection|PaymentRent[] $payment_rents
 *
 * @package App\Models
 */
class Booking extends Model
{
	protected $table = 'booking';
	protected $primaryKey = 'ID_BOOKING';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'DATE_START',
		'DATE_FINISH'
	];

	protected $fillable = [
		'ID_CLIENT',
		'ID_VEHICLES',
		'ID_EMPLOYES',
		'ID_SALES',
		'DATE_START',
		'DATE_FINISH'
	];

	public function sale()
	{
		return $this->belongsTo(Sale::class, 'ID_SALES');
	}

	public function employes_company()
	{
		return $this->belongsTo(EmployesCompany::class, 'ID_EMPLOYES');
	}

	public function client()
	{
		return $this->belongsTo(Client::class, 'ID_CLIENT');
	}

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class, 'ID_VEHICLES');
	}

	public function payment_rents()
	{
		return $this->hasMany(PaymentRent::class, 'ID_BOOKING');
	}
}
