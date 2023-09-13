<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPilihan extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_pilihan';

    protected $primaryKey = 'kd_pilihan';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
