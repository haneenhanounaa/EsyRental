<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['apartment_id', 'user_id', 'rating', 'comment'];

    // Relationship with Apartment
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    // Relationship with User (Reviewer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
