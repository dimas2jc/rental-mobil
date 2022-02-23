<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property string $id_company
 * @property string $name_company
 * @property string $address_company
 * @property float $phone_company
 * @property string $email_company
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'company';
	protected $primaryKey = 'id_company';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'phone_company' => 'float'
	];

	protected $fillable = [
		'name_company',
		'address_company',
		'phone_company',
		'email_company'
	];
}
