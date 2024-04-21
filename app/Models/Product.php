<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $fillable=[
        'name_en','name_ar','description_en','description_ar','price','category_id','quantity','photo'
    ];
    public function scopeActive($query)
    {
        return $query->where('active',1);
    }
    public function scopeSelection($query)
    {
        $lang = Session::get('local');
        return $query->select('id','category_id','name_'.$lang.' as name','price','quantity','photo','description_'.$lang.' as description');
    }
    public function Filter($query,$start,$end)
    {
        $lang = Session::get('local');
        return $query->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
    }
    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
