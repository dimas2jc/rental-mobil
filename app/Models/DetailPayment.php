<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPayment
 * 
 * @property string|null $ID_PAYMENT_RENT
 * @property int $PRICE_CHARGE
 * @property int $NAME_CHARGE
 *
 * @package App\Models
 */
class DetailPayment extends Model
{
	protected $table = 'detail_payment';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PRICE_CHARGE' => 'int',
		'NAME_CHARGE' => 'int'
	];

	protected $fillable = [
		'ID_PAYMENT_RENT',
		'PRICE_CHARGE',
		'NAME_CHARGE'
	];
}
