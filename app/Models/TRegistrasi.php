<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRegistrasi extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 't_registrasi';

    protected $primaryKey = 'kd_registrasi';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
