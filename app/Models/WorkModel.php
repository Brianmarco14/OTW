<?php

namespace App\Models;

use App\Models\User;
use App\Http\Traits\Uuid;
use App\Models\PageModel;
use App\Models\GenreModel;
use App\Models\CategoryModel;
use App\Models\PlaylistModel;
use App\Models\WorkFileModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkModel extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    protected $casts = [
        'id'=>'string'
    ];
    protected $table = 'work';
    protected $guarded = [''];
    public $incrementing = false;
    public $timestamp = true;

    public function page()  {
        return $this->belongsTo(PageModel::class,'page_id','id');
    }
    public function collection()  {
        return $this->belongsTo(PlaylistModel::class,'playlist_id','id');
    }
    public function category()  {
        return $this->belongsTo(CategoryModel::class,'m_category_id','id');
    }
    public function genre()  {
        return $this->belongsTo(GenreModel::class,'m_genre_id','id');
    }
    public function writer()  {
        return $this->belongsTo(User::class,'writter','id');
    }

}
