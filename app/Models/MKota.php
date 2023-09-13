<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MKota extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_kota';

    protected $primaryKey = 'kd_kota';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
