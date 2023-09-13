<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPemeriksaanLab01 extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_pemeriksaan_lab_01';

    protected $primaryKey = 'kd_pemeriksaan_lab_01';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
