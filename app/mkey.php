<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mkey extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'm_key';

    protected $primaryKey = 'nm_table';
    protected $keyType = 'string';

    protected $guarded =[];

    public $timestamps = false;
}