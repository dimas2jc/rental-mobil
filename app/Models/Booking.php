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
 * @property string $id_booking
 * @property string|null $id_custormer
 * @property string|null $id_vehicles
 * @property string|null $id_employes
 * @property string|null $id_sales
 * @property Carbon $date_start
 * @property Carbon $date_finish
 * @property int $price_sales
 * @property int|null $dp_sales
 * @property bool $status_booking
 * @property int|null $komisi_sales
 * 
 * @property Sale|null $sale
 * @property EmployesCompany|null $employes_company
 * @property Customer|null $customer
 * @property Vehicle|null $vehicle
 * @property Collection|DetailPayment[] $detail_payments
 *
 * @package App\Models
 */
class Booking extends Model
{
	protected $table = 'booking';
	protected $primaryKey = 'id_booking';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'price_sales' => 'int',
		'dp_sales' => 'int',
		'status_booking' => 'bool',
		'komisi_sales' => 'int'
	];

	protected $dates = [
		'date_start',
		'date_finish'
	];

	protected $fillable = [
		'id_custormer',
		'id_vehicles',
		'id_employes',
		'id_sales',
		'date_start',
		'date_finish',
		'price_sales',
		'dp_sales',
		'status_booking',
		'komisi_sales'
	];

	public function sale()
	{
		return $this->belongsTo(Sale::class, 'id_sales');
	}

	public function employes_company()
	{
		return $this->belongsTo(EmployesCompany::class, 'id_employes');
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'id_custormer');
	}

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class, 'id_vehicles');
	}

	public function detail_payments()
	{
		return $this->hasMany(DetailPayment::class, 'id_booking');
	}
}
