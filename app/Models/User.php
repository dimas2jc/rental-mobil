<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
	protected $primaryKey = 'id';
	public $incrementing = false;
	public $timestamps = true;

	protected $fillable = [
		'id',
        'username',
        'password',
        'created_at',
        'updated_at',
        'status',
        'role'
	];
}
