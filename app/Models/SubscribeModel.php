<?php

namespace App\Models;

use App\Models\User;
use App\Http\Traits\Uuid;
use App\Models\PageModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscribeModel extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    protected $casts = [
        'id'=>'string'
    ];
    protected $table = 'subscribe';
    protected $guarded = [''];
    public $incrementing = false;
    public $timestamp = true;
    public function user()  {
        return $this->belongsTo(User::class);
    }
    public function page()  {
        return $this->belongsTo(PageModel::class);
    }


}
