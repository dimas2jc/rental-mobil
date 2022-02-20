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
 * @property string|null $ID_CUSTORMER
 * @property string|null $ID_VEHICLES
 * @property string|null $ID_EMPLOYES
 * @property string|null $ID_SALES
 * @property Carbon $DATE_START
 * @property Carbon $DATE_FINISH
 * @property string $PRICE_SALES
 * @property int $DP_SALES
 * @property bool $STATUS_BOOKING
 * 
 * @property Sale|null $sale
 * @property EmployesCompany|null $employes_company
 * @property Customer|null $customer
 * @property Vehicle|null $vehicle
 * @property Collection|Relationship9[] $relationship9s
 *
 * @package App\Models
 */
class Booking extends Model
{
	protected $table = 'booking';
	protected $primaryKey = 'ID_BOOKING';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DP_SALES' => 'int',
		'STATUS_BOOKING' => 'bool'
	];

	protected $dates = [
		'DATE_START',
		'DATE_FINISH'
	];

	protected $fillable = [
		'ID_CUSTORMER',
		'ID_VEHICLES',
		'ID_EMPLOYES',
		'ID_SALES',
		'DATE_START',
		'DATE_FINISH',
		'PRICE_SALES',
		'DP_SALES',
		'STATUS_BOOKING'
	];

	public function sale()
	{
		return $this->belongsTo(Sale::class, 'ID_SALES');
	}

	public function employes_company()
	{
		return $this->belongsTo(EmployesCompany::class, 'ID_EMPLOYES');
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'ID_CUSTORMER');
	}

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class, 'ID_VEHICLES');
	}

	public function relationship9s()
	{
		return $this->hasMany(Relationship9::class, 'ID_BOOKING');
	}
}
