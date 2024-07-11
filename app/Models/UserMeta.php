<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $table = 'user_meta';
    protected $fillable = [
        'user_id',
        'last_name',
        'address',
        'zip_code',
        'city',
        'state',
        'country'
    ];

}
