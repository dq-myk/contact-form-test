<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail'
    ];

    // Category とのリレーション (1対1)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword) && empty($gender) && empty($category_id) && empty($date)) {
            $query->where(function ($subQuery) use ($keyword) {
                    $subQuery->where('first_name', 'like', '%' . $keyword . '%')
                        ->orWhere('last_name', 'like', '%' . $keyword . '%')
                        ->orWhere('email', 'like', '%' . $keyword . '%');
                });
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender) && empty($keyword) && empty($category_id) && empty($date)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id) && empty($keyword) && empty($gender) && empty($date)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query, $date)
    {
        if (!empty($date) && empty($category_id) && empty($keyword) && empty($gender)) {
            $query->where('created_at', $date);
        }
    }

}