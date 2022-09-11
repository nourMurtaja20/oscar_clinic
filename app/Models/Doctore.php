<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Doctore extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'doctors';
    protected $fillable = [
        'id',
        'specialization',
        'gender',
        'addres',
        'UserId','imgUrl',

    ];

    public function user ()
    {
        return $this->belongsTo(User::class,'UserId','id');
    }
    public function Service()
    {
        return $this->hasMany(Service::class);
    }
}
