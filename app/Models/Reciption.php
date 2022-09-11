<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reciption extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'receptions';
    protected $fillable = [
        'id',
        'user_id',
        'phone',
        'addres',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
