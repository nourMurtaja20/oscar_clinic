<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{

    use HasFactory;
    use SoftDeletes;

    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'services';
    protected $fillable = ['title', 'discription', 'doctorID', 'Duration', 'id'];

    public function users()
    {
        return ($this->hasManyThrough (
            User::class,
            Doctore::class,
            'id',
            'id',
            'doctorID',
            'UserId'
        ));
    }

    public function doctores ()
    {
        return $this->belongsTo(Doctore::class);
        
    }


    public function patient ()
    {
        return $this->belongsTo (Patient::class);
    }

    public function Appointment ()
    {
        return $this->belongsTo (Appintment::class);
    }


}
