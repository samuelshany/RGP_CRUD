<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $fillable = [
        'name_en','name_ar'
    ];
    public function scopeSelection($query)
    {
        $lang = Session::get('local');
        return $query->select('id','name_'.$lang.' as name');
    }
    public function products() :HasMany
    {
        return $this->hasMany(Product::class);
    }
}
