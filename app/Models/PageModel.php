<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageModel extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    protected $casts = [
        'id'=>'string'
    ];
    protected $table = 'page';
    protected $guarded = [''];
    public $incrementing = false;
    public $timestamp = true;

    public function owner() {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
