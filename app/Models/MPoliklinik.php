<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPoliklinik extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_poliklinik';

    protected $primaryKey = 'kd_poliklinik';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
