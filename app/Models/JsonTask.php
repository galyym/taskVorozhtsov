<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class JsonTask extends Model
{
    use HasFactory;

    protected $fillable = [
        "data",
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
