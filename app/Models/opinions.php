<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class opinions extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'opinions';
    protected $fillable = [
        'id',
        'Content',
        'patient_ID',
        'status'
    ];
    public function user ()
    {
        return $this->belongsTo(User::class,'patient_ID','id');
    }
}
