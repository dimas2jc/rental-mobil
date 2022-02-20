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
 * @property string $ID_EMPLOYES
 * @property string $NAME_EMPLOYES
 * @property string $ADDRESS_EMPLOYES
 * @property string $PHONE_EMPLOYES
 * @property bool $STATUS_EMPLOYES
 * 
 * @property Collection|Booking[] $bookings
 *
 * @package App\Models
 */
class EmployesCompany extends Model
{
	protected $table = 'employes_company';
	protected $primaryKey = 'ID_EMPLOYES';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'STATUS_EMPLOYES' => 'bool'
	];

	protected $fillable = [
		'NAME_EMPLOYES',
		'ADDRESS_EMPLOYES',
		'PHONE_EMPLOYES',
		'STATUS_EMPLOYES'
	];

	public function bookings()
	{
		return $this->hasMany(Booking::class, 'ID_EMPLOYES');
	}
}
