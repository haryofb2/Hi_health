<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPemeriksaanGolongan extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_pemeriksaan_golongan';

    protected $primaryKey = 'kd_pemeriksaan_golongan';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
