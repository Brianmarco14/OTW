<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use  HasFactory, SoftDeletes, Uuid;

    protected $table = 'm_category';
    public $incrementing = false;
    public $timestamp = true;
    protected $guarded = [''];

    protected $casts = [
        'id'=>'string'
    ];

}
