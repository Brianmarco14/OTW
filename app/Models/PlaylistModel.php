<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaylistModel extends Model
{
    use  HasFactory, SoftDeletes, Uuid;

    protected $table = 'playlist';
    public $incrementing = false;
    public $timestamp = true;
    protected $casts = [
        'id'=>'string'
    ];
    protected $guarded = [''];

    public function page()  {
        return $this->belongsTo(PageModel::class);
    }

}
