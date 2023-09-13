<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDokter extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_dokter';

    protected $primaryKey = 'kd_dokter';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
