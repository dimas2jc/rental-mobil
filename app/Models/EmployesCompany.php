<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployesCompany
 * 
 * @property string $id_employes
 * @property string $name_employes
 * @property string $address_employes
 * @property float $phone_employes
 * @property bool $status_employes
 * 
 * @property Collection|Booking[] $bookings
 *
 * @package App\Models
 */
class EmployesCompany extends Model
{
	protected $table = 'employes_company';
	protected $primaryKey = 'id_employes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'phone_employes' => 'float',
		'status_employes' => 'bool'
	];

	protected $fillable = [
		'name_employes',
		'address_employes',
		'phone_employes',
		'status_employes'
	];

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'id_employes');
	}
}
