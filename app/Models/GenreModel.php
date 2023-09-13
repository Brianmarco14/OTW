<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GenreModel extends Model
{
    use  HasFactory, SoftDeletes, Uuid;

    protected $table = 'm_genre';
    protected $guarded = [''];
    public $incrementing = false;
    public $timestamp = true;

    protected $casts = [
        'id'=>'string'
    ];

    
}
