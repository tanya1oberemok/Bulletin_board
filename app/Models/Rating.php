<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'rateable_id',
        'rateable_type',
        'rating',
    ];

    public function rateable()
    {
        return $this->morphTo();
    }

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function bulletins() {
        return $this->belongsTo(Bulletin::class);
    }

}
