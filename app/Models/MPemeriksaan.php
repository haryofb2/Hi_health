<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPemeriksaan extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_pemeriksaan';

    protected $primaryKey = 'kd_pemeriksaan';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
