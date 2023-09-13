<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class counterdocument extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'm_counter_document';

    protected $primaryKey = 'kd_counter_doc';
    protected $keyType = 'string';

    protected $guarded =[];

    public $timestamps = false;
}
