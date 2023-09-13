<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tablelist extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'table_list';

    protected $primaryKey = 'nm_table';
    protected $keyType = 'string';

    protected $guarded =[];


    public $timestamps = false;
}