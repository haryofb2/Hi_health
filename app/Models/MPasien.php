<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPasien extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_pasien';

    protected $primaryKey = 'kd_pasien';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
