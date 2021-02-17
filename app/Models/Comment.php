<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'bulletin_id',
        'description',
        'author'
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bulletins() {
        return $this->belongsTo(Bulletin::class, 'bulletin_id');
    }
}
