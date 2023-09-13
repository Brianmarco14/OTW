<?php

namespace App\Models;

use App\Models\User;
use App\Http\Traits\Uuid;
use App\Models\WorkModel;
use App\Models\CategoryModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeModel extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    protected $casts = [
        'id'=>'string'
    ];
    protected $table = 'like';
    protected $guarded = [''];
    public $incrementing = false;
    public $timestamp = true;
    public function user()  {
        return $this->belongsTo(User::class);
    }
    public function work()  {
        return $this->belongsTo(WorkModel::class);
    }
    public function category()  {
        return $this->belongsTo(CategoryModel::class);
    }
}
