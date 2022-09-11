<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appintment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'appointments';
    protected $fillable = [
        'id',
        'start',
        'end',
        'title',
        'patientID',
        'serviceID',
        'doctorID',
        'status',
        'specialCases',

    ];
    public function users(){
        return ($this->hasManyThrough(
            User::class,
            Doctore::class,
            'id',
            'id',
            'doctorID',
            'UserId'
        ) );

    }

    public function patientInfo(){
        return ($this->hasMany (Patient::class,'id','patientID'));
    }

    public  function  services(){
        return ($this->hasMany(Service::class,'id','serviceID'));
    }
    public function Patients ()
    { return ($this->hasManyThrough(
        User::class,
            Patient::class,
            'id',
            'id',
            'patientID',
            'user_id')
    );
    }
    public function Notes(){
        return ($this->hasOne (Note::class));
    }


}
