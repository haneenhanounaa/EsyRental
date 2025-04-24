<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = ['apartment_id', 'user_id', 'start_date', 'end_date', 'status','price','final_price','number_of_days'];

    // Relationship with Apartment
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    // Relationship with User (Guest)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
