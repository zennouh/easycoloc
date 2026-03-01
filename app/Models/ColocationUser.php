<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColocationUser extends Pivot
{
    use SoftDeletes;
    protected $table = 'colocation_user';

    protected $fillable = [
        'user_id',
        'colocation_id',
        'role',
        'joined_at',
        'left_at'
    ];

    protected $casts = [
        'joined_at' => 'date',
        'left_at' => 'date'
    ];
}
