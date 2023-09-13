<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCabang extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_cabang';

    protected $primaryKey = 'kd_cabang';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
