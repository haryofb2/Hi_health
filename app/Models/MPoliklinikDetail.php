<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPoliklinikDetail extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_poliklinik_detail';

    protected $primaryKey = 'kd_poliklinik_detail';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
