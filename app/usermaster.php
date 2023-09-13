<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usermaster extends Model
{
    //
    protected $connection = 'sqlsrv';

    protected $table = 'user_master';

    protected $primaryKey = 'kd_user';
    protected $keyType = 'string';

    // protected $fillable = [];

    protected $guarded =[];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class,'kd_karyawan','kd_karyawan');
    }
    public function reservationslipupdate()
    {
        return $this->hasMany(reservationslip::class);
    }



}