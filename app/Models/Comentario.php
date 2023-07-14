<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    //fillable
    protected $fillable = [
        'user_id',
        'post_id',
        'comentario'
    ];

    function user () {
        return $this->belongsTo(User::class);
    }
}
