<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSpesialis extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_spesialis';

    protected $primaryKey = 'kd_spesialis';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;
}
