<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class clintMassage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'clintMassage';
    protected $fillable = [
        'id',
        'massage',
        'email',
        'statuseReply'
    ];

}
