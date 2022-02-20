<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeeSale
 * 
 * @property string|null $ID_BOOKING
 * @property int $FEE_SALES
 * @property string $NAME_SALES_FEE
 * @property Carbon $DATETIME_BOOKING
 *
 * @package App\Models
 */
class FeeSale extends Model
{
	protected $table = 'fee_sales';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'FEE_SALES' => 'int'
	];

	protected $dates = [
		'DATETIME_BOOKING'
	];

	protected $fillable = [
		'ID_BOOKING',
		'FEE_SALES',
		'NAME_SALES_FEE',
		'DATETIME_BOOKING'
	];
}
