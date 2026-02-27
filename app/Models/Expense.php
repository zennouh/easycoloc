<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'title',
        'amount',
        'date',
        'user_id',
        'colocation_id',
        'category_id'
    ];

    protected $casts = [
        'amount' => 'float',
        'date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
