<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;
    public $fillable=['name','abbr','active'];
    public function scopeActive($query)
    {
        return $query->where('active',1);
    }
    public function scopeSelection($query)
    {
        return $query->select('id','name','abbr');
    }
    public function scopeSelections($query)
    {
        return $query->select('name');
    }
}
