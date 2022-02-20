<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property string $ID_COMPANY
 * @property string $NAME_COMPANY
 * @property string $ADDRESS_COMPANY
 * @property string $PHONE_COMPANY
 * @property string $EMAIL_COMPANY
 * @property string $LOGO
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'company';
	protected $primaryKey = 'ID_COMPANY';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NAME_COMPANY',
		'ADDRESS_COMPANY',
		'PHONE_COMPANY',
		'EMAIL_COMPANY',
		'LOGO'
	];
}
