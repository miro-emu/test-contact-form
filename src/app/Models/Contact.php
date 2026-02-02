<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'category_id',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id){
        if (!empty($category_id)) {
        $query->where('category_id', $category_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
            $query->where('content', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    public function scopeGenderSearch($query, $gender){
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
        return $query;
    }

    public function scopeDateSearch($query, $date){
        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
        return $query;
    }



}
